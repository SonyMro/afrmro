<?php
class mlUser extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	public function listarUsuarios()
	{
		$q =  $this->db->query('select u.IdUsuario, u.Nombre, u.Apepat,u.Apemat,u.mail, g.Nombre, r.RolUser from usuarios as u
inner join gerencias as g
on u.idGerencia =g.IdGerencia
inner join roles as r
on u.idRol =r.IdRol;');
		if ($q->num_rows() > 0) {
			return $q;
		} else {
			return false;
		}
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
	public function listarRoles()
	{
		$query =  $this->db->get('roles');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}

	public function insertar($datos)
	{
		try {
			$this->db->trans_start();
			$this->db->insert('usuarios', $datos);
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
