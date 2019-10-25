<?php
class mlPreguntas extends CI_Model
{
	 private $db1, $db2 ;
	function __construct()
	{	parent::__construct();
		try {
		$this->db1 = $this->load->database('default', true);
		$this->db2 = $this->load->database('dbm', true);
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}	
	}
	public function getPreguntas(){
		//$query = $this->db->get('preguntas');
		$query =  $this->db1->get('preguntas');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}
	}
	public function getDatosMicriosip()
	{	$query = $this->db2->get('tbl');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}		
	}
	public function NumeroReservacion($Numero)
	{
		$num=$Numero;
	}
}
?>
