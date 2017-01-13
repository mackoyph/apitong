<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('login');
		}
		else
		{
			$data['username'] = $this->session->userdata('logged_in')['username'];
			$data['jsvars'] = array( 'sidebar_active' => 'home');
			$this->load->view('templates/header', $data);
			$this->load->view('home_view', $data);
			$this->load->view('templates/footer', $data);
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