<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$array = array('ACCESS_USERNAME' => $username, 'ACCESS_PASSWORD' => MD5($password));
		$email = array('ACCESS_EMAIL' => $username, 'ACCESS_PASSWORD' => MD5($password));
		$this -> db -> select('ACCESS_NO')
					-> from('admin_access')
					-> where($array)
					-> or_where($email);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>