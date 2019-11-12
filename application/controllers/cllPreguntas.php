<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cllPreguntas extends CI_Controller {
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	 function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mldb2');
		$this->load->model('mlPreguntas');		
	}
	public function cargarPreguntas(){
	$this->load->view('../views/complementos/header');
	$datos['preguntas'] = $this->mlPreguntas->getPreguntas();
	//$datos['datos2'] = $this->mlPreguntas->getDatosMicriosip();
	$this->load->view('encuesta', $datos);
	$this->load->view('../views/complementos/footer');
	}
	public function BuscarNumeroReservacion()
	{
		$Numero=$this->input->post();
		$info=array(
			'id' => $Numero['numero']
		);
		
	}
	public function obtenerPreguntas()
	{
		$this->load->view('../views/complementos/header');
		//$datos['datos2'] = $this->mlPreguntas->getDatosMicriosip();
		$datos['preguntas'] = $this->mlPreguntas->ObternerPreguntas();
		$datos['secciones'] = $this->mlPreguntas->Seciones();
		$this->load->view('encuesta', $datos);
		$this->load->view('../views/complementos/footer');	
	}
	
}
