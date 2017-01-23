<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_management extends CI_Controller {
	private $c = "ARTICLE CONTROLLER";
	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}
	
	private function setupData()
	{
		$data['username'] = $this->session->userdata('logged_in')['username'];
		$data['jsvars'] = array( 'sidebar_active' => 'admin-mgmt');
		$data['userid'] = $this->session->userdata('logged_in')['id'];
		$data['errormsg'] = NULL;
		return $data;
	}
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->check_loggedin();
		$data['username'] = $this->session->userdata('logged_in')['username'];
		$data['jsvars'] = array( 'sidebar_active' => 'home');
		$this->load->view('templates/header', $data);
		$this->load->view('home_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function crud() 
	{
		$this->check_loggedin();
		$data = $this->setupData();
		$this->load->model('article');
		$articles = $this->article->getArticles();
		$data['articles'] = $articles;
		$this->load->view('templates/header', $data);
		$this->load->view('article/crud', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function edit($article_id)
	{
		$this->check_loggedin();
		$data = $this->setupData();
		$this->load->model('article');
		$article = $this->article->getArticle($article_id);
		$this->debug('edit','article=' . var_export($article_id, TRUE));
		if (count($article) == 0) {
			redirect('article_management/crud');
		}
		$data['article'] = $article[0];
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('text', 'Text', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('edit', 'form validation run == false, showing edit form');
			$this->load->view('templates/header', $data);
			$this->load->view('article/edit', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$edit = array();
			$edit['title'] = $this->input->post('title');
			$edit['text'] = $this->input->post('text');
			
			$dbresult = $this->article->editAdminAccount($edit, $article_id);
			if($dbresult)
			{
				redirect('article_management/crud');
			}
			else
			{
				$data['errormsg'] = 'Could not update database.';
				$this->load->view('templates/header', $data);
			$this->load->view('article/edit', $data);
			$this->load->view('templates/footer', $data);
			}
		}
		
	}
	
	private function check_loggedin() 
	{
		if(!$this->session->has_userdata('logged_in'))
		{
			$this->debug('checkLoggedIn', 'user not logged in, redirecting to login page');
			redirect('login');			
		}
	}
}
?>