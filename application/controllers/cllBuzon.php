
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cllBuzon extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlBuzon');
		$this->load->library('session');
	}
	public function QuejasSugerencias()
	{
		$Navbar['verNav'] = false;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('QuejasSugerencias');
		$this->load->view('../views/complementos/footer');
	}
	public function insertarBuzon()
	{  $idgere='1';
		$datos = array(
			'Nombre' => $this->input->post('txtNombre'),
			'apellidos' => $this->input->post('txtApes'),
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
		$this->mlBuzon->InsertarBuzon($datos);
	/*	$Navbar['verNav'] = false;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('home'); {
			$this->load->view('../views/complementos/footer');
		}*/
		redirect(base_url());
	}
	public function listarBuzon(){
		$datos['listaBuzon'] = $this->mlBuzon->ListarDatos();
		$this->load->view('../views/complementos/header');
		$this->load->view('vwBuzon',$datos);
		$this->load->view('../views/complementos/footer');
	}
	public function allBuzon()
	{	
		$ver=$this->mlBuzon->ListarDatos();
		$Navbar['verNav'] = true;
		if ($ver!=null) {
			$dat['buzon']=$ver;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('buzon',$dat);
			$this->load->view('../views/complementos/footer');	
		} else {
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('buzon');
			$this->load->view('../views/complementos/footer');
		}
		
	}
	public function allClaves()
	{
	//	$datos['listaBuzon'] = $this->mlBuzon->ListarDatos();
		$ver = $this->mlBuzon->allClaves();
		$Navbar['verNav'] = true;
		if ($ver!=null) {
			$dat['claves'] = $ver;
			$dat['geren'] = $this->mlBuzon->allGerencias();
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('buzonclave', $dat);
			$this->load->view('../views/complementos/footer');
		} else {
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('buzonclave');
			$this->load->view('../views/complementos/footer');
		}
		
	}
	public function inserclave()
	{
		$dat=array(
			'palabra'=>$this->input->post('txtPal'),
			'IdGerencia' => $this->input->post('sGerencia')
			//sGerencia
		);
		$ver=$this->mlBuzon->insertarClave($dat);
		if ($ver) {
			redirect(base_url('index.php/cllBuzon/allClaves'));
		} else {
			redirect(base_url('index.php/cllBuzon/allClaves'));
		}
		
	}
	public function eliminarClave()
	{	
		$id=$this->input->post('txtid');	
		$ver=$this->mlBuzon->deleteClave($id);
		if ($ver) {
			redirect(base_url('index.php/cllBuzon/allClaves'));
		} else {
			redirect(base_url('index.php/cllBuzon/allClaves'));
		}			
	}


	public function clasificar($cadena)
	{
		$claves=$this->mlBuzon->getClaves();
		$idg='';

		if ($claves!=null && $cadena) {
			foreach ($claves as $clave) {
				//	explode(".", $str)
				$pos = strrpos($cadena, $clave->palabra);			
				if ($pos === false) { // nota: tres signos de igual
					$idg= 10;				
				} else {
					$idg= $clave->IdGerencia;
					break;
				}
			}	

		} else {
			
		}
		echo $idg;
		
	}
	public function enviar()
	{
		/*$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'sony15.mro@gmail.com',
			'smtp_pass' => 'kof2002magic',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1',
			'wordwrap'=>true
		);*/
		//$this->load->helper('email', $config);
		//	$this->load->library('email', $config);
		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'sony15.mro@gmail.com';
		$config['smtp_pass']    = 'kof2002magic';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // o html
		$config['validation'] = TRUE; // para validar el correo electronico
		$this->email->initialize($config);
		$this->email->from('sony15.mro@gmail.com', 'Your Name');
		$this->email->to('mro.hdpv@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

		
/*
		$this->email->from('sony15.mro@gmail.com', 'Your Name');
		$this->email->to('mro.hdpv@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');*/

	}


}
