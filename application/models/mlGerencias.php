<?php
class mlGerencias extends CI_Model
{
	
	function __construct()
	{	parent::__construct();
		
	 $this->load->database();
			
	}
public function listarGerencias()
{
		$query =  $this->db->get('gerencias');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
}
public function InsertarGeren($datos)
{
		try {
			$this->db->trans_start();
			$this->db->insert('gerencias', $datos);
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
	public function Edit($idg)
	{
		$e = $this->db->get_where('gerencias', $idg);
	
			if ($e!=null) {
			return $e->result();			
			} else {
				return false;
			}
	}

	public function ActuaizarGerencia($parametros, $idge)
	{
			try {
			$this->db->trans_start();
			$this->db->where('IdGerencia', $idge);
			$this->db->update('gerencias', $parametros);
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
	public function eliminar($idg)
	{
		try {
			$this->db->trans_start();
			$this->db->delete('gerencias', $idg);
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
