<?php
class mlPremios extends CI_Model
{
	 
	function __construct()
	{	parent::__construct();
		
		$this->load->database();
			
	}
	
	public function listar()
	{	$query =  $this->db->get('premios');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
	public function editM($idP)
	{
		$e = $this->db->query('select*from premios where IdPremio="'.$idP.'";');

		if ($e != null) {
			return $e;
		} else {
			return false;
		}
	}
	public function modificar($parametros,$idP)
	{
		try {
			$this->db->trans_start();
			$this->db->where('IdPremio', $idP);
			$this->db->update('premios', $parametros);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}

	public function insert($datos)
	{
		try {
			$this->db->trans_start();
			$this->db->insert('premios', $datos);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	
	public function detele($idP)
	{
		try {
			$this->db->trans_start();
			$this->db->delete('premios', $idP);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}

}
