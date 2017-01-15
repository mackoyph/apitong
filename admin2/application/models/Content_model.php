<?php
Class About_model extends CI_Model
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
				->where('content-desc', $desc);
		$query = $this->db->get();
		return $query->result();
	}
}
?>