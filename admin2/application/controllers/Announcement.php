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

	function new_announcement()
	{
		$this->check_loggedin();
		$data = $this->setupData();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Article Text', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('announcement/new', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$dbParams = array(
				'title' => $this->input->post('title'),
				'text' => $this->input->post('editor1')
			);
			$this->debug('new_announceent', 'dbParams=' . var_export($dbParams, TRUE));
			$dbResult = $this->announcements->addAnnouncement($dbParams);
			if($dbResult)
			{
				$this->debug('new', 'new announcement creation successful');
				redirect('announcement/listing/1');
			}
			else
			{
				$this->debug('edit', 'could not update database, showing edit page again');
				$data['errormsg'] = 'Could not add announcement to database.';
				$this->load->view('templates/header', $data);
				$this->load->view('announcement/new', $data);
				$this->load->view('templates/footer', $data);
			}
		}

	}

	function edit($id=FALSE)
	{
		$this->debug('edit', 'inside edit, $id=' . var_export($id, TRUE));
		$this->check_loggedin();
		$data = $this -> setupData();
		$data['jsvars'] = $data['jsvars'] = array( 'sidebar_active' => 'announcement');

		if($id===FALSE)
		{
			$this->debug('edit', 'id is not set, redirecting to listing');
			redirect('announcement/listing/1');
		}

		$data['article'] = $this->announcements->getAnnouncement($id);
		$this->debug('edit', 'article='. var_export($data['article'], TRUE));
		if($data['article'] === NULL)
		{
			$this->debug('edit', 'no such article exists, redirecting to listing');
			redirect('announcement/listing/1');
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Article Text', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->debug('edit', 'form validation run = false, showing page');
			$this->load->view('templates/header', $data);
			$this->load->view('announcement/edit', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$dbParam = array(
				'title' => $this->input->post('title'),
				'text' => $this->input->post('editor1'),
				'id'=>$id
			);
			$dbResult = $this->announcements->updateAnnouncement($dbParam);
			if($dbResult)
			{
				
				$this->load->library('user_agent');
				if ($this->agent->is_referral())
				{
					$this->debug('edit', 'db update success, redirecting to referrer');
					echo $this->agent->referrer();
				}
				else
				{
					$this->debug('edit', 'db update success, redirecting to listing');
					redirect('announcement/listing/1');
				}
			}
			else
			{
				$this->debug('edit', 'could not update database, showing edit page again');
				$data['errormsg'] = 'Could not update article to database.';
				$this->load->view('templates/header', $data);
				$this->load->view('announcement/edit', $data);
				$this->load->view('templates/footer', $data);
			}
		}
	}

	function delete($id = FALSE)
	{
		$this->check_loggedin();
		$data = $this->setupData();
		if($id === FALSE)
		{
			redirect('announcement/listing/1');
		}
		if(!is_numeric($id))
		{
			show_404();
		}
		$dbResult = $this->announcements->deleteAnnouncement($id);
		$this->debug('delete', 'dbResult=' . var_export($dbResult, TRUE));
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
			$this->debug('delete', 'db delete op success, redirecting to referrer');
			echo $this->agent->referrer();
		}
		else
		{
			$this->debug('delete', 'redirecting to listing/1');
			redirect('announcement/listing/1');
		}
	}

}
?>