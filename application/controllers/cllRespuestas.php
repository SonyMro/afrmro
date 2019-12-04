
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
	public function resultados()
	{
		$dat= array(
		"idp"=> $this->input->get('idp'),
		"desde"=> $this->input->get('desde'),
	"hasta"=> $this->input->get('hasta'));
	//print_r($dat);
	//echo($dat['desde']);
		//echo 'id'.$idp.' desde '.$desde.' hasta '.$hasta;
		header("Content-Type: application/json");	
		$resultados=$this->mlRespuestas->verResultados($dat['idp'], $dat['desde'], $dat['hasta']);
		if ($resultados!=null) {
			$data['status']='ok';
			$data['result']=$resultados;
			echo json_encode($data);
		} else {
			echo '{"status":"err","result":"null"}';
		}/**/
	}
}
