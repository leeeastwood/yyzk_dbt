<?php
Class Admin extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('UserID, UserEmail, UserPassword,uRole');
		$this -> db -> from('dbt_admin');
		$this -> db -> where('UserEmail = ' . "'" . $username . "'"); 
		$this -> db -> where('UserPassword = ' . "'" . $password. "'"); 
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