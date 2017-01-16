<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement extends CI_Controller {
	private $c = "ANNOUNCEMENT CONTROLLER";

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
		redirect('announcement/listing/1');
	}

	function listing($page = 1)
	{
		$this->check_loggedin();

		$data = $this -> setupData();
		$data['jsvars'] = $data['jsvars'] = array( 'sidebar_active' => 'announcement');

		//checking of page parameter
		if ($page < 1 || !is_numeric($page))
		{
			$page = 1;
		}
		$data['numPages'] = $this->announcements->getNumPages();
		$data['currentPage'] = $page;
		if($page > $data['numPages'])
		{
			redirect('announcement/listing/1');
		}
		
		$announcements = $this->announcements->getAnnouncements($page);
		$this->debug('listing', 'announcements=' . var_export($announcements, TRUE));
		$data['announcements'] = $announcements;

		

		$this->load->view('templates/header', $data);
		$this->load->view('announcement/listing', $data);
		$this->load->view('templates/footer', $data);
	}

}
?>