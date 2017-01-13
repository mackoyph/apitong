<?php
Class Admin extends CI_Model
{
	function getAdminAccounts()
	{
		$this->db->select('ACCESS_NO, ACCESS_LASTNAME, ACCESS_FIRSTNAME, ACCESS_USERNAME, ACCESS_EMAIL, ACCESS_CONTACT, ACCESS_ADDRESS')
				-> from('admin_access');
		$query = $this->db->get();
		return $query->result();
	}
	
	function getAdminAccount($admin_id)
	{
		$this->db->select('*')
				->from('admin_access')
				->where('ACCESS_NO', $admin_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function editAdminAccount($edit, $admin_id)
	{
		$dbparam = array();
		$dbparam['ACCESS_FIRSTNAME'] = $edit['firstname'];
		$dbparam['ACCESS_LASTNAME'] = $edit['lastname'];
		$dbparam['ACCESS_USERNAME'] = $edit['username'];
		$dbparam['ACCESS_CONTACT'] = $edit['contact'];
		$dbparam['ACCESS_EMAIL'] = $edit['email'];
		$dbparam['ACCESS_ADDRESS'] = $edit['address'];
		$this->db->where('ACCESS_NO', $admin_id);
		return $this->db->update('admin_access', $dbparam);
	}
}
?>