<?php
class mlBuzon extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function InsertarBuzon($datos)
	{
		try {			
		$this->db->insert('buzon', $datos);
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}

	public function ListarDatos()
	{	$query = $this->db->get('buzon');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
	
}
