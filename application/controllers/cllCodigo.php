<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');
class cllCodigo extends CI_Controller // en esta clase se van ha ejecutar las operaciones de la tabla codigos

{
	function __construct()
	{// se inicializan las bibliotecas y los modelos 
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlCodigo');
		$this->load->library('session');
	}
	public function index()
	{
		$Navbar['verNav'] = true;// este caso se pone true para que el navbar se pueda visualizar
		$this->load->view('../views/complementos/header', $Navbar);// se carga el header
		$this->load->view('code');// se cargar el body
		$this->load->view('../views/complementos/footer');// se carga el footer 
	}
	public function getCode()//se obtienen todos los codigos 
	{
		header("Content-Type: application/json");	
		$ver=$this->mlCodigo->allCode();// se hace la consulta a la base de datos
		if ($ver!=null) {// se valida que no esten vacios
			$datos['status']="ok";// se carga el estado de la consulta
			$datos['result']=$ver;//se cargan el resultado
			echo json_encode($datos);
		} else {
			echo '{"status":"err","result":"vacio" }';			
		}		
	}
	public function buscarCode()// Esta funcion busca el codigo de que se registra en el juego 
	{	$cod=$this->input->post('code');//obtiene el valor del campo code enviado desde el form 
		header("Content-Type: application/json");
		$ver = $this->mlCodigo->PorCode($cod);// busca el object en la base de datos
		if ($ver != null) {// preguna si es valido
			$datos['status'] = "ok";//se crea un arreglo con el name datos
			$datos['result'] = $ver;//se almacenas el resultado de la consulta
			echo json_encode($datos);
		} else {//manda el error 
			echo '{"status":"err","result":"vacio" }';
		}		
	}
	public function canje()//en esta funcion hace un update de la tabla codigos
	{
		$id = $this->input->post('id');// obtiene el id que llega desde el form 
		$ver=$this->mlCodigo->Canjeado($id);// actualliza la tabla codigos
		if ($ver) {// verifica que la operacion haya sido un exito
			echo '{"status":"ok"}';
		} else {// manda un error si no
			echo'{"status":"err"}';
		}
		
	}
 }
