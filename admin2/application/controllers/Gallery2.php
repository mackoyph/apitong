<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery2 extends CI_Controller {
	private $c = "Gallery2 CONTROLLER";

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
		$this->load->model('announcements');
		date_default_timezone_set("Asia/Manila");
	}

	function index()
	{
		$this->check_loggedin();
		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'gallery2');
		$this->load->view('templates/header', $data);
		$this->load->view('gallery2/gallery', $data);
		$this->load->view('templates/footer', $data);
	}


}
?>