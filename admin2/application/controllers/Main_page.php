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
		redirect('main_page/view');
	}
	function view($home = FALSE)
	{
		$this->debug('view', 'inside view method of main page controller');
		$this->debug('view', '$home= ' . var_export($home, TRUE));
		$this->check_loggedin();

		$data = $this->setupData();
		

		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($home === FALSE)
		{
			$data['jsvars'] = array( 'sidebar_active' => 'main-page');
			$data['home'] = FALSE;
			$this->debug('view', 'home is false, getting non-home content');
			$content_descs = $this->content_model->getContentDescs();
			$data['contents'] = $this->content_model->getContents();
		}
		else
		{
			$data['jsvars'] = array( 'sidebar_active' => 'home-page');
			$data['home'] = TRUE;
			$this->debug('view', 'home is not false, getting home content');
			$content_descs = $this->content_model->getContentDescs(TRUE);
			$data['contents'] = $this->content_model->getContents(TRUE);
		}

		
		
		foreach($content_descs as $row)
		{
			$key = $row->content_desc;
			$this->form_validation->set_rules($key, $key, 'trim|required');
		}


		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('view', 'form validation run = false, showing page');
			//first run, display only, OR required field missing
			$this->load->view('templates/header', $data);
			$this->load->view('mainpage/view', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$this->debug('view', 'form validation success, saving to database');
			//all fields present, save to database
			$posts = $this->input->post();
			$dbResult = $this->content_model->updateContents($posts);
			if($dbResult === FALSE)
			{
				$this->debug('view', 'updating database failed');
				$data['errormsg'] = "Could not update database.";
				$this->load->view('templates/header', $data);
				$this->load->view('mainpage/view', $data);
				$this->load->view('templates/footer', $data);
			}
			else 
			{
				$this->debug('view', 'updating database success');
				if ($home === FALSE)
				{
					$this->debug('view', 'redirecting to /main_page');
					redirect('main_page');
				}
				else
				{
					$this->debug('view', 'redirecting to /home_page');
					redirect('home_page');
				}
			}
			
		}
		
	}
}
?>