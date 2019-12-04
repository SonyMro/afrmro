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
	public function verResultados()
	{
		$query = $this->db->query('SELECT DISTINCT(Respuesta),
(SELECT count(Respuesta) 
from respuestas WHERE Respuesta = r.Respuesta)  
as cantidad
from respuestas as r
where Idpregunta=2 and (date(fecha) BETWEEN "2019-01-01" AND "2019-12-30") order by cantidad desc;');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
}/*Fin clase */
