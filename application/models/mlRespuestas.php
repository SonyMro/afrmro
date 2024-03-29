<?php
class mlRespuestas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getPreguntas()
	{
		$query = $this->db->get('preguntas');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
	public function Insertar($datos)
	{
		try {
			$this->db->trans_start();
			$this->db->insert('respuestas', $datos);
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
	public function verResultados($idp,$desd,$hast)
	{
		$query = $this->db->query('
SELECT DISTINCT(Respuesta),
(SELECT count(Respuesta) 
from respuestas WHERE Respuesta = r.Respuesta)  
as cantidad
from respuestas as r
where Idpregunta='.$idp.' and (date(fecha) BETWEEN "'.$desd.'" AND "'.$hast.'") order by cantidad desc;');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
}/*Fin clase */
