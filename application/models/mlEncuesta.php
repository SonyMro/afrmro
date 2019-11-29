<?php
class mlEncuesta extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getPreguntas(){
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
			$this->db->insert('encuesta', $datos);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return FALSE;
			} else {
				   return $insert_id;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}

	public function buscarServicios($cadena)
	{
		$listar='';
		$listaservicios = explode(",", $cadena);
		$tam=count($listaservicios);
		if (empty($listaservicios)) {
			$listar = '';
		} else {
			for ($i=0; $i <$tam ; $i++) {
				switch ($listaservicios[$i]) {
					case 'Safari con guía':
						$listar .="1,";
						break;
					case 'Autobús Contratado':
						$listar .='2,';
						break;
					case 'Servicio educativo':
						$listar .='3,';
						break;
					case 'Servicio de alimentos':
						$listar .='4,';
						break;
					default:
						break;
				}
			}
			
		}

		return $listar.'5';
	}
	
}
