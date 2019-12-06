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
	{	$query = $this->db->query('SELECT b.IdBuzon,b.Nombre,b.apellidos,b.Edad,b.correo,b.telefono,b.direccion,b.codigoPostal,b.fecha,b.Recorrido,b.Recomendaccion,b.comentarios,b.IdGerencia,g.Nombre as gerencia  FROM buzon as b
inner join gerencias as g
on b.IdGerencia=g.IdGerencia;');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function getClaves()
	{
		$query=$this->db->get('buzonclave');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
		
	}
	public function insertarClave($datos)
	{
		try {
			$this->db->trans_start();
			$this->db->insert('buzonclave', $datos);
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
	public function updateclave($id,$da)
	{
		try {
			$this->db->trans_start();
			$this->db->where('BuzonClave', $id);
			$this->db->update('buzonclave', $da);
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
	public function deleteClave($id)
	{
		try {
			$this->db->trans_start();
			$this->db->query('delete from buzonclave where BuzonClave='.$id.';');
			$this->db->trans_complete();
			if ($this->db->trans_status() == FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	public function allClaves()	{
		$query =  $this->db->query('select b.BuzonClave as idbc,b.palabra,b.IdGerencia,g.Nombre from buzonclave as b
inner join gerencias as g
on b.IdGerencia=g.IdGerencia;');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function allGerencias()
	{	
		$query =  $this->db->get('gerencias');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
}
