<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_page extends CI_Controller {
	private $c = "Main Page CONTROLLER";

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
		$this->load->model('content_model');
		date_default_timezone_set("Asia/Manila");
	}
	
	function index()
	{
		$this->check_loggedin();

		$data = $this->setupData();
		$data['jsvars'] = array( 'sidebar_active' => 'main-page');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$content_descs = $this->content_model->getContentDescs();

		$data['contents'] = $this->content_model->getContents();
		foreach($content_descs as $row)
		{
			$key = $row->content_desc;
			$this->form_validation->set_rules($key, $key, 'trim|required');
		}


		if ($this->form_validation->run() == FALSE)
		{
			//first run, display only, OR required field missing
			$this->load->view('templates/header', $data);
			$this->load->view('mainpage/view', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//all fields present, save to database
			$posts = $this->input->post();
			$dbResult = $this->content_model->updateContents($posts);
			if($dbResult === FALSE)
			{
				$this->debug('index', 'updating database failed');
				$data['errormsg'] = "Could not update database.";
				$this->load->view('templates/header', $data);
				$this->load->view('mainpage/view', $data);
				$this->load->view('templates/footer', $data);
			}
			else 
			{
				redirect('main_page');
			}
			
		}
		
	}
}
?>