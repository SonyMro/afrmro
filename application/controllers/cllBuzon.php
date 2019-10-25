
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cllBuzon extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlBuzon');
	}
	public function QuejasSugerencias()
	{
		$this->load->view('../views/complementos/header');
		$this->load->view('QuejasSugerencias');
		$this->load->view('../views/complementos/footer');
	}
	public function insertarBuzon()
	{  $idgere='1';
		$datos = array(
			'Nombre' => $this->input->post('txtNombre'),
			'Edad'=>$this->input->post('txtEdad'),
			'correo' => $this->input->post('txtMail'),
			'telefono' => $this->input->post('txtTel'),
			'direccion' => $this->input->post('txtDir'),
			'codigoPostal' => $this->input->post('txtCp'),
			'fecha' => $this->input->post('txtFecha'),
			'Recorrido' => $this->input->post('optradio1'),
			'Recomendaccion' => $this->input->post('optradio2'),
			'comentarios' => $this->input->post('txtQs'),
			'IdGerencia' => $idgere
		);
	//	$this->mlBuzon->InsertarBuzon($datos);
		$this->load->view('../views/complementos/header');
		$this->load->view('home'); {
			$this->load->view('../views/complementos/footer');
		}
	}
	public function listarBuzon(){
		$datos['listaBuzon'] = $this->mlBuzon->ListarDatos();
		$this->load->view('../views/complementos/header');
		$this->load->view('vwBuzon',$datos);
		$this->load->view('../views/complementos/footer');
	}

}
