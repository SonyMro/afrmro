<?php 
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');
class cllEncuesta extends CI_Controller //En esta clase se relizan las operaciones de la clase de la tabla encuesta

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
	public function insertar()// se obtienen los datos enviado desde el form y se insertan en la base de datos  
	{		$datos = array(
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
		$servicios = $this->input->post('txtServ');//Se obtiene el campo de servicios
		$ver = $this->mlEncuesta->buscarServicios($servicios);// se hace una consulta en la base de datos para buscar los servicios
		//echo $ver;
//		redirect(base_url('index.php/cllPreguntas/obtenerPreguntas'));
		/**/$verificar = $this->mlEncuesta->Insertar($datos);//La consulta se almacena en esta variable 
		if ($verificar != false) {// se verifica que exista 
			$this->session->set_flashdata('in',$ver);//se crea una varible de session para pasarla en la siguiente view
			$this->session->set_flashdata('idEnc', $verificar);//se crea otra variable de session para almacenar el id de la encuesta
			redirect(base_url('index.php/cllPreguntas/obtenerPreguntas'));// se redirecciona al pagina de preguntas
		} else {
			// Es preferible dejar este else vacio para evitar errores.
		}
	}

}
?>
