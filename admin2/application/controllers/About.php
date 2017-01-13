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
	}
	
	function index()
	{
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
}
?>