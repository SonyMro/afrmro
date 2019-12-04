<?php
class mlPreguntas extends CI_Model
{
	 private $db1, $db2 ;
	function __construct()
	{	parent::__construct();
		try {
		$this->db1 = $this->load->database('default', true);
	//	$this->db2 = $this->load->database('dbm', true);
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
	public function ObternerPreguntas($listar)	{
		//$lista='2,4,5';
$query = $this->db1->query('SELECT p.IdPregunta, p.Pregunta, p.tipo, p.IdSecion, s.NombreSecion, p.subpregunta FROM preguntas as p
inner join seccion as s
on p.IdSecion= s.IdSecion
WHERE p.IdSecion IN ('.$listar.')
ORDER BY p.IdSecion,p.numero;');
		if ($query != null) {
			return $query;
		} else {
		
			return false;
		}
	}
	public function Seciones()
	{
		$query = $this->db1->query('SELECT * FROM evaluaciondeservicio.seccion;');
		if ($query != null) {
			return $query;
		} else {

			return false;
		}
	}
	public function NumeroReservacion($Numero)
	{
		$num=$Numero;
	}
	public function listarPorgerencia($idg)
	{
		$query=$this->db1->query('SELECT * from  preguntas where IdGerencia='.$idg. ' order by IdSecion,numero;');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
		return null;
		}
		
	}
	public function AllPreguntas()
	{
		$query = $this->db1->query('SELECT * from  preguntas  order by IdSecion,numero;');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return null;
		}
	 }
}
?>
