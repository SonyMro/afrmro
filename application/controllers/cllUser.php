<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class cllUser extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlUser');
	}
	
	public function index()
	{
		$datos['gerencias'] = $this->mlUser->listarGerencias();
		$datos['roles'] = $this->mlUser->listarRoles();
		$this->load->view('../views/complementos/header');
		$this->load->view('Usuarios' ,$datos);
		$this->load->view('../views/complementos/footer');
	}
	public function login(){
		$this->load->view('../views/complementos/header');
		$this->load->view('user');
		$this->load->view('../views/complementos/footer');
	}
	public function registrarUser()
	{
		$data = array(
			'Nombre'  => $this->input->post('txtNombre'),
			'Apepat'  => $this->input->post('txtApepat'),
			'Apemat'  => $this->input->post('txtApemat'),
			'mail'  => $this->input->post('txtMail'),
			'pass'  => $this->input->post('txtPass'),
			'idGerencia'  => $this->input->post('slgerencias'),
			'idRol'  => $this->input->post('slRol')

		);
		$verificar=$this->mlUser->insertar($data);
		if ($verificar) {
			redirect(base_url('index.php/cllUser'));
		} else {
			redirect(base_url('index.php/cllUser'));
		}
		
		//$this->mlPremios->insert($data);
	}

	public function show()
	{
		header("Content-Type: application/json");
		$datos = $this->mlUser->listarUsuarios()->result();
		echo json_encode($datos);
	}
	
}
