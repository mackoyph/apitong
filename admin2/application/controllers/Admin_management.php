<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_management extends CI_Controller {
	private $c = "ADMIN-MANAGEMENT CONTROLLER";
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
		$this->load->model('admin');
		$accounts = $this->admin->getAdminAccounts();
		$data['admin_accounts'] = $accounts;
		$this->load->view('templates/header', $data);
		$this->load->view('admin/crud', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function edit($admin_id)
	{
		if($admin_id == NULL) {
			redirect('home');
		}
		$this->check_loggedin();
		$data = $this->setupData();
		$this->load->model('admin');
		$account = $this->admin->getAdminAccount($admin_id);
		$this->debug('edit','account=' . var_export($account, TRUE));
		if (count($account) == 0) {
			redirect('admin_management/crud');
		}
		$data['admin_account'] = $account[0];
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('contact', 'Contact #', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('edit', 'form validation run == false, showing edit form');
			$this->load->view('templates/header', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$edit = array();
			$edit['firstname'] = $this->input->post('firstname');
			$edit['lastname'] = $this->input->post('lastname');
			$edit['username'] = $this->input->post('username');
			$edit['email'] = $this->input->post('email');
			$edit['contact'] = $this->input->post('contact');
			$edit['address'] = $this->input->post('address');
			
			$dbresult = $this->admin->editAdminAccount($edit, $admin_id);
			if($dbresult)
			{
				redirect('admin_management/crud');
			}
			else
			{
				$data['errormsg'] = 'Could not update database.';
				$this->load->view('templates/header', $data);
			$this->load->view('admin/edit', $data);
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

	function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login');
    }
}
?>