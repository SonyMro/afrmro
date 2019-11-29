<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cllEncuesta extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlEncuesta');
		$this->load->library('session'); 
	}
	public function index()
	{
		print('Hola ');
	}
	/*public function buscarReservacion()
	{
		$this->load->view('../views/complementos/header');
		$this->load->view('encuesta');
		$this->load->view('../views/complementos/footer');
	}*/
	public function insertar()
	{if (true) {
		# code...
	} else {
		# code...
	}
	
		$datos = array(
			'NumReservacion' => $this->input->post('txtRef'),
			'fecha' => $this->input->post('txtFecha'),
			'Telefono' => $this->input->post('txtTel'),
			'InstGrupo' => $this->input->post('txtGrup'),
			'mail' => $this->input->post('txtMail'),
			'visitado' => $this->input->post('txtvisita'),
			'NumAdultos' => $this->input->post('txtAdult'),
			'NumNinos' => $this->input->post('txtNinios'),
			'conboy' => $this->input->post('txtConvoy'),
			'responsable' => $this->input->post('txtRespon'),
			'servicios' => $this->input->post('txtServ')
		);
		$servicios = $this->input->post('txtServ');
		
		$ver = $this->mlEncuesta->buscarServicios($servicios);
		//echo $ver;
//		redirect(base_url('index.php/cllPreguntas/obtenerPreguntas'));
		/**/$verificar = $this->mlEncuesta->Insertar($datos);
		if ($verificar != false) {
			$this->session->set_flashdata('in',$ver);
			redirect(base_url('index.php/cllPreguntas/obtenerPreguntas'));
		} else {
			
		}
	}

}
?>
