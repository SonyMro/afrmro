<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class cllPremios extends CI_Controller {
	
	 function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlPremios');
		$this->load->library('session'); 
		$this->load->database();	
	}
	public function index(){
		$datos['datos'] = $this->mlPremios->listar();
		if ($datos !=null) {
			$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('Premios',$datos);
			$this->load->view('../views/complementos/footer');
		} else {
			$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('Premios');
			$this->load->view('../views/complementos/footer');
		}
	}

	function show(){
		header("Content-Type: application/json");		
		$datos= $this->mlPremios->listar()->result();
		echo json_encode($datos);
	}
	public function edit($id)
	{	header("Content-Type: application/json");
		$datos = $this->mlPremios->editM($id)-> result();
		if ($datos==false) {
			$data = '{"result": false}';
				echo $data;
		} else {
			echo json_encode($datos);
		}
	}
	public function save()
	{
		$data = array(
			'Nombre'  => $this->input->post('Nombre'),
			'foto'  => $this->input->post('img'),
			'Descripcion'  => $this->input->post('des')
		);
 $this->mlPremios->insert($data);

	}
	public function code(){
		$data = array(
			'Idpremio'  => $this->input->post('IdPremio'),
			'codigo'  => $this->input->post('code')
		);
		$ver=$this->mlPremios->registrarCode($data);
		if ($ver) {
			echo 'Si';
		} else {
			echo 'No';
		}
		
	}
	public function eliminar($idp){
		$parametros = array("IdPremio" => $idp);		
	$verificar=	$this->mlPremios->detele($parametros);
	if ($verificar) {
			echo 'Si';
	} else {
			echo 'No';
	}
	
	}
	public function modificar()
	{
		$idusu = $this->input->post('Id');
			$data = array(
				'Nombre'  => $this->input->post('Nombre'),
				'foto'  => $this->input->post('img'),
				'Descripcion'  => $this->input->post('des'),
				'Stock'  => $this->input->post('Stock'),
			);
		$this->mlPremios->modificar($data, $idusu);
	}

}
