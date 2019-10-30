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
		$this->load->database();	
	}
	public function index(){
		$datos['datos'] = $this->mlPremios->listar();
		if ($datos !=null) {
			$this->load->view('../views/complementos/header');
			$this->load->view('Premios',$datos);
			$this->load->view('../views/complementos/footer');
		} else {
			$this->load->view('../views/complementos/header');
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
			'Descripcion'  => $this->input->post('des'),
			'Stock'  => $this->input->post('Stock'),
		);
	//	$verificar = $this->mlPremios->insert($data);
	//	echo $verificar;
	}

}
