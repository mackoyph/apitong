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

	function updateContents($params)
	{
		$data = array();
		foreach($params as $key=>$value) 
		{
			$temp = array(
				'content_desc' => $key,
				'content' => $value
			);
			array_push($data, $temp);
		}
		return $this->db->update_batch('contents', $data, 'content_desc');
	}

	function getContentDescs($home = FALSE) {
		$this->db->select('content_desc')
				->from('contents');
		if ($home === FALSE)
		{
			$this->db->not_like('content_desc', 'home-', 'after');
		}
		else
		{
			$this->db->like('content_desc', 'home-', 'after');
		}
		$query = $this->db->get();
		return $query->result();
	}

	function getAllContents()
	{
		$this->db->select('*')
				->from('contents');
		$query = $this->db->get();
		return $query->result();
	}
	function getContents($home = FALSE)
	{
		$this->db->select('*')
			->from('contents');
		if($home === FALSE)
		{
			$this->db->not_like('content_desc', 'home-', 'after');
		}
		else
		{
			$this->db->like('content_desc', 'home-', 'after');
		}
			
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