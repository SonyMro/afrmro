
<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');

class cllRespuestas extends CI_Controller//En esta clase se realizan las operacciones de la tablas Respuestas
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlRespuestas');
		$this->load->library('session'); 
		
	}

	public function insertar()//Se insertan las respuestas que de recuperan del form
	{//Resp: respuesta, Pregunta: idPregunta, Enc: idEnc, Fecha:fecha
		$datos = array(
			'Respuesta' => $this->input->post('Resp'),
			'Idpregunta' => $this->input->post('Pregunta'),
			'IdEncuesta' => $this->input->post('Enc'),
			'fecha' => $this->input->post('Fecha')
		);//Se obtienen los datos de la respuestas
		$verificar = $this->mlRespuestas->Insertar($datos);// se ejecutaa el insert
		if ($verificar == true) {//se pregunta que el insert se correcto
			$data = '{"result": true}';//imprimimos un true
			echo $data;
		} else {// de no ser asi imprimimos un false
			$data = '{"result": false}';
			echo $data;
		}

	}
	public function resultados()//Se enlistan los resultados de las preguntas 
	{
		$dat= array(
		"idp"=> $this->input->get('idp'),
		"desde"=> $this->input->get('desde'),
	"hasta"=> $this->input->get('hasta'));//Se obtienen lo datos de la pregunta la fecha de inicio y la del fin
		header("Content-Type: application/json");	
		$resultados=$this->mlRespuestas->verResultados($dat['idp'], $dat['desde'], $dat['hasta']);//Se hace la consulta
		if ($resultados!=null) {// si la consulta no devuelve null se manda a la vista 
			$data['status']='ok';
			$data['result']=$resultados;
			echo json_encode($data);//Se imprime el resultado
		} else {
			echo '{"status":"err","result":"null"}';//Se imprime un error
		}/**/
	}
}
