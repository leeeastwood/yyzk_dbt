<?php
Class Consultation extends CI_Model
{
	function checkStatus($prKey)
	{
		$this -> db -> select('cStatus');
		$this -> db -> from('dbt_consultation');
		$this -> db -> where('CID = ' . "'" . $prKey . "'"); 
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
    
    
    function submit($prKey)
	{
        $data = array(
               'cStatus' => '办理中',
        );

        $this->db->where('CID', $prKey);
        $result = $this->db->update('dbt_consultation', $data); 

		if($result == true)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
    
    function cancel($prKey)
	{
        $data = array(
               'cStatus' => '尚未提交',
        );

        $this->db->where('CID', $prKey);
        $result = $this->db->update('dbt_consultation', $data); 

		if($result == true)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
    
}
?>