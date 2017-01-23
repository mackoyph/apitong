<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ex_cont extends CI_Controller {
		
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

	function elfinder_init()
	{
		$this->load->helper('path');
		$opts = array(
		// 'debug' => true, 
			'roots' => array(
				array( 
					'driver' => 'LocalFileSystem', 
					'path'   => set_realpath('assets/uploads/gallery'), 
					'URL'    => base_url('assets/uploads/gallery')
				// more elFinder options here
				)
			)
		);
		$this->load->library('elfinder_lib', $opts);
	}

}
?>