
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cllRespuestas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlRespuestas');
		$this->load->library('session'); 
		
	}

	public function insertar()
	{//Resp: respuesta, Pregunta: idPregunta, Enc: idEnc, Fecha:fecha
		$datos = array(
			'Respuesta' => $this->input->post('Resp'),
			'Idpregunta' => $this->input->post('Pregunta'),
			'IdEncuesta' => $this->input->post('Enc'),
			'fecha' => $this->input->post('Fecha')
		);
		$verificar = $this->mlRespuestas->Insertar($datos);
		if ($verificar == true) {
			$data = '{"result": true}';
			echo $data;
		} else {
			$data = '{"result": false}';
			echo $data;
		}

	}
	

}
