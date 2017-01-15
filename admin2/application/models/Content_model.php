<?php
Class Content_model extends CI_Model
{
	private $c = "ABOUT MODEL";

	private function debug($function, $message)
	{
		log_message('debug', $this->c . " : " . $function . " : " . $message);
	}

	function getContent($desc)
	{
		$this->db->select('*')
				->from('contents')
				->where('content_desc', $desc);
		$query = $this->db->get();
		return $query->result();
	}

	function getFooterContact() 
	{
		$footerContact = array();
		$footer_contact = array();
		$this->db->select('content')
				->from('contents')
				->where('content_desc', 'footer-contactnumber');
		$query = $this->db->get();
		$result = $query -> row();
		$footerContact['contactnumber'] = $result->content;
		$this->db->select('content')
				->from('contents')
				->where('content_desc', 'footer-contactemail');
		$query = $this->db->get();
		$result = $query -> row();
		$footerContact['contactemail'] = $result->content;
		$this->db->select('content')
				->from('contents')
				->where('content_desc', 'footer-contactaddress');
		$query = $this->db->get();
		$result = $query -> row();
		$footerContact['contactaddress'] = $result->content;


		$this->debug('getFooterContact', '$result ='.var_export($result, TRUE));
		return $footerContact;
	}
}
?>