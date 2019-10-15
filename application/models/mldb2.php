<?php
class mldb2 extends CI_Model
{
	 
	function __construct()
	{	parent::__construct();
		//$this->load->database();
		 $this->load->database('dbm',true);
	}
	
	public function getDatosMicriosip()
	{
		$query = $this->db->get('tbl');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
		
	}
}
