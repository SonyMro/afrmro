<?php
class mlFelicitaciones extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function insertHappy($datos)
	{
		try {
			$this->db->trans_start();
			$this->db->insert('felicitaciones', $datos);
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
