<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	private $c = "ABOUT CONTROLLER";

	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}
	
	private function check_loggedin()
	{
		if(!$this->session->has_userdata('logged_in'))
		{
			$this->debug('check_loggedin', ' user not logged in, redirecting to login page');
			redirect('login');
		}
	}
	
	private function setupData()
	{
		$data['username'] = $this->session->userdata('logged_in')['username'];		
		$data['userid'] = $this->session->userdata('logged_in')['id'];
		$data['errormsg'] = NULL;
		return $data;
	}
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('about_model');
		date_default_timezone_set("Asia/Manila");
	}
	
	function index()
	{
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'about-page');
		
		$main_about_article = $this->about_model->getMainAboutArticle();

		if(count($main_about_article) != 0)
		{
			$data['main_about'] = $main_about_article[0];	
		}

		$this->debug('index', 'main_about=' . var_export($data['main_about'], TRUE));
		$articles = $this->about_model->getAboutArticles();

		$this->debug('index', 'articles=' . var_export($articles, TRUE));
		$data['about_articles'] = $articles;

		$this->load->view('templates/header', $data);
		$this->load->view('about/view', $data);
		$this->load->view('templates/footer', $data);
	}

	function new_article()
	{
		$this->debug('new_article', "POST Variables=" . var_export($this->input->post(), TRUE));
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'about-page');

		$this->debug('new_article' , 'php timezone=' . date_default_timezone_get());
		$data['about_categories'] = $this->about_model->getAboutCategories();

		//load form validation
		//load form helper
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'First Name', 'trim|required');
		$this->form_validation->set_rules('editor1', 'First Name', 'trim|required');
		$this->form_validation->set_rules('category', 'First Name', 'numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('new_article', 'form validation run = false, redirecting to new article page again');
			$this->load->view('templates/header', $data);
			$this->load->view('about/new_article', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//save to database
			$this->debug('new_article', 'Title=' . var_export($this->input->post('title'), TRUE));
			$this->debug('new_article', 'text=' . var_export($this->input->post('editor1'), TRUE));
			$this->debug('new_article', 'category=' . var_export($this->input->post('category'), TRUE));
			$title = $this->input->post('title');
			$text = $this->input->post('editor1');
			$category = $this->input->post('category');
			$creation_date = date("Y-m-d H:i:s");
			$edit_date = $creation_date;
			$author = $data['userid'];
			$editor = $author;

			$dbParams = array(
				'author_id' => $author,
				'last_edited_by' => $editor,
				'creation_date' =>$creation_date,
				'last_edit_date' => $edit_date,
				'title' => $title,
				'text' => $text,
				'category' => $category
			);

			$dbResult = $this->about_model->addAboutArticle($dbParams);
			if ($dbResult)
			{
				redirect('about');
			}
			else
			{
				$data['errormsg'] = 'Could not update database.';
			}
			
			//redirect back to admin panel for about page
		}

	}
}
?>