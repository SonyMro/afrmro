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
		$this->load->model('mlPreguntas');
	}
	public function cargarPreguntas(){
	$this->load->view('../views/complementos/header');
	$datosPreguntas['allPreguntas'] = $this->mlPreguntas->getPreguntas();
	$this->load->view('encuesta',$datosPreguntas);
	$this->load->view('../views/complementos/footer');
	}
	public function hola()
	{
		echo 'hola';
	}
	
}
