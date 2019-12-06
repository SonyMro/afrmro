<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cllGerencias extends CI_Controller {
	
	 function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlGerencias');
		$this->load->library('session'); 		
	}
	public function index(){
		$datos['datos'] = $this->mlGerencias->listarGerencias();
		if ($datos !=null) {
			$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('Gerencias',$datos);
			$this->load->view('../views/complementos/footer');
		} else {
			$this->load->view('../views/complementos/header');
			$this->load->view('Gerencias');
			$this->load->view('../views/complementos/footer');
		}
	}
	public function insertGerencia(){
		$datos = array(
			'Nombre' => $this->input->post('txtNombre'),
			'Descripcion' => $this->input->post('txtDesc')
		);
		$verificar = $this->mlGerencias->InsertarGeren($datos);
		if ($verificar == true) {
			redirect(base_url('index.php/cllGerencias'));
			
		} else {
			echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
		}
					
	}
	public function Edit($idg)
	{
		$params = array('IdGerencia' => $idg);
		$datos['datos'] = $this->mlGerencias->listarGerencias();
		$datos['gerencia'] = $this->mlGerencias->Edit($params);
		if ($datos!=null) {
			$this->load->view('../views/complementos/header');
			$this->load->view('Gerencias', $datos);
			$this->load->view('../views/complementos/footer');
		} else {
			$this->load->view('../views/complementos/header');
			$this->load->view('Gerencias');
			$this->load->view('../views/complementos/footer');
		}
		

	}
	public function modificarGerencia()
	{
		$parametros = array(
			"Nombre" => $this->input->post('txtNombreM'),
			"Descripcion" => $this->input->post('txtDesM')
		);
		$idge = $this->input->post('txtIdG');
		$verificar = $this->mlGerencias->ActuaizarGerencia($parametros, $idge);
		if ($verificar===true) {
			redirect(base_url('index.php/cllGerencias'));
		} else {
			echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
		}
		
	}
	public function delete($idg){
		$parametros = array("IdGerencia" => $idg);
		$validar = $this->mlGerencias->eliminar($parametros);
		if ($validar===true) {
			redirect(base_url('index.php/cllGerencias'));
		} else {
			echo 'Error';
		}
		
	}


}
