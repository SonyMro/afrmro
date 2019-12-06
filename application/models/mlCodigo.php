<?php
class mlCodigo extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function allCode()
	{
		$query = $this->db->query('select c.IdCodigo,c.codigo,c.Idpremio,c.intercambio,p.Nombre, p.foto from codigo as c
inner join premios as p
on c.Idpremio=p.IdPremio;');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function PorCode($cod)
	{
		$q = $this->db->query('select c.IdCodigo,c.codigo,c.Idpremio,c.intercambio,p.Nombre, p.foto  from codigo as c
inner join premios as p
on c.Idpremio=p.IdPremio
where codigo="' . $cod . '";');
		if ($q != null) {
			return $q->result();
		} else {
			return null;
		}
	}
	public function Canjeado($id)
	{
		try {
			$this->db->trans_start();
			$this->db->query('UPDATE codigo SET intercambio="si" WHERE IdCodigo='.$id.';');
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
