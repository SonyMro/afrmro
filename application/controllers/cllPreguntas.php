<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') OR exit('No direct script access allowed');
class cllPreguntas extends CI_Controller {//Es esta fucnion se ejecutan las operaiones de la tbl de preguntas
		
	 function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mldb2');
		$this->load->model('mlPreguntas');
		$this->load->library('session'); 	
	}
	public function cargarPreguntas(){//En esta funcion de enlistan todas las preguntas 
	$this->load->view('../views/complementos/header');// se carga el encabezado
	$datos['preguntas'] = $this->mlPreguntas->getPreguntas();// se enlistan todas las preguntas y elmacena en este arreglo 
	//$datos['datos2'] = $this->mlPreguntas->getDatosMicriosip();
	$this->load->view('encuesta', $datos);//Se carga la vista de encuesta y se le pasan los datos
	$this->load->view('../views/complementos/footer');// Se carga el pie de pagina
	}
	public function BuscarNumeroReservacion()
	{
		$Numero=$this->input->post();
		$info=array(
			'id' => $Numero['numero']
		);
		
	}
	public function obtenerPreguntas()//Esta funcion carga la lista de preguntas dependiendo de los servicios de los clientes
	{
		$in = $this->session->flashdata('in');// se obtiene la lista de los servicios
		$idEncuesta = $this->session->flashdata('idEnc');// se obtine el id de los datos del encuestado
		$Navbar['verNav'] = false;
		$this->load->view('../views/complementos/header', $Navbar);
		$datos['preguntas'] = $this->mlPreguntas->ObternerPreguntas($in);//Se hace una consulta para obtner las preguntas
		$datos['secciones'] = $this->mlPreguntas->Seciones();//Se carga la tabla de secciones
		$datos['idEncuesta'] = $idEncuesta;//Se optine el id de le encuesta
		$this->load->view('encuesta', $datos);//Se de pasan los datos y se cargar le vista de encuestas
		$this->load->view('../views/complementos/footer');//Se carga el pie de pagina
		// destroy session
		$this->session->sess_destroy();
	}
public function buscarPreguntas()
{
	header("Content-Type: application/json");	
	$idg =$this->input->post('idg');
	$idr  = $this->input->post('idr');
	if ($idr=='1') {
			$consulta = $this->mlPreguntas->AllPreguntas()->result();
	} else {
			$consulta = $this->mlPreguntas->listarPorgerencia($idg)->result();
	}
	
	if ($consulta!=null) {
		$data['status'] = "ok";
		$data['result']=$consulta;
		echo json_encode($data);
	} else {
		echo '{"status":"err","result":"null"}';
	}
	
}
	
}
