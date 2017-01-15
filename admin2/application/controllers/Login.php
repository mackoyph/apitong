<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
		
	private $c = "LOGIN CONTROLLER";
	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}
	function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	
	function index()
	{
		$this->debug('index', 'Inside index() method.');
		if ($this->session->has_userdata('logged_in'))
		{
			$this->debug('index', 'User already logged in, redirecting to home.');
			redirect('Home');
		}
		else
		{
			$this->debug('index', 'user not yet logged in, loading the login page');
			$this->load->helper(array('form'));
			$this->load->view('login_view');
		}
	}

	function verifyLogin()
	{
		$this->debug('verifyLogin', 'inside verifyLogin');
		//This method will have the credentials validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		 if($this->form_validation->run() == FALSE)
		{
			$this->debug('verifyLogin', 'User credentials validation failed, showing login page again.');
			//Field validation failed.  User redirected to login page
		 	$this->load->view('login_view');
	 	}
	 	else
	 	{
			 $this->debug('verifyLogin', 'User credential validation succeeded, redirecting to private area.');
		 	//Go to private area
			redirect('Login');
	 	}
	}

	function check_database($password)
	{
		//$this->debug('check_database', 'password='.$password);
		$username = $this->input->post('username');
	 	$result = $this->user->login($username, $password);

	 	if($result)
	 	{
			$sess_array = array();
		 	foreach($result as $row)
		 	{
				$sess_array = array(
					'id' => $row->ACCESS_NO,
					'username' => $row->ACCESS_USERNAME
				);
				$this->debug('check_database', 'sess_array=' . var_export($sess_array, TRUE));
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
}
?>