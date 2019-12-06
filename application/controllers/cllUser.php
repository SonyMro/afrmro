<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class cllUser extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlUser');
		$this->load->library('session');
	}

	public function index()
	{
		$datos['gerencias'] = $this->mlUser->listarGerencias();
		$datos['roles'] = $this->mlUser->listarRoles();
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('Usuarios', $datos);
		$this->load->view('../views/complementos/footer');
	}
	public function login()
	{
	//	$this->session->sess_destroy();
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('user');
		$this->load->view('../views/complementos/footer');
	}
	public function registrarUser()
	{
		$data = array(
			'Nombre'  => $this->input->post('txtNombre'),
			'Apepat'  => $this->input->post('txtApepat'),
			'Apemat'  => $this->input->post('txtApemat'),
			'mail'  => $this->input->post('txtMail'),
			'pass'  => $this->input->post('txtPass'),
			'idGerencia'  => $this->input->post('slgerencias'),
			'idRol'  => $this->input->post('slRol')

		);
		$verificar = $this->mlUser->insertar($data);
		if ($verificar) {
			redirect(base_url('index.php/cllUser'));
		} else {
			redirect(base_url('index.php/cllUser'));
		}

		//$this->mlPremios->insert($data);
	}

	public function show()
	{
		header("Content-Type: application/json");
		$datos = $this->mlUser->listarUsuarios()->result();
		echo json_encode($datos);
	}
	public function EditUser()
	{
		$parametros = array(
			"Nombre" => $this->input->post('MtxtNombre'),
			"Apepat" => $this->input->post('MtxtApepat'),
			"Apemat" => $this->input->post('MtxtApemat'),
			"mail" => $this->input->post('MtxtMail'),
			"idGerencia" => $this->input->post('Mslgerencias'),
			"idRol" => $this->input->post('MslRol')
		);
		$idUser = $this->input->post('MtxtId');
		$verificar = $this->mlUser->update($idUser, $parametros);
		if ($verificar === true) {
			redirect(base_url('index.php/cllUser'));
		} else {
			echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
			redirect(base_url('index.php/cllUser'));
		}
	}
	public function menu()
	{
		$mail = $this->input->post('txtCorreo');
		$pw = $this->input->post('txtPass');
		$ver = $this->mlUser->usuario($mail, $pw);
		//	print_r($ver);
		/*	*/
		if ($ver != false) {
/*	*/		$usuario_data = array(
				'id' => $ver->IdUsuario,
				'nombre' => $ver->usernom,
				'pat' => $ver->Apepat,
				'mat' => $ver->Apemat,
				'mail' => $ver->mail,
				'idg' => $ver->idGerencia,
				'idR' => $ver->idRol,
				'geren' => $ver->Nombre,
				'rol' => $ver->RolUser,
				'logueado' => TRUE
			);
			$this->session->set_userdata($usuario_data);
			$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('menu');
			$this->load->view('../views/complementos/footer');
		} else {
			redirect(base_url('index.php/cllUser/login'));
		 }
	}
	/*Ajax */
	public function buscarPass()
	{
		header("Content-Type: application/json");
		$mail = $this->input->post('mail');
		$pw = $this->input->post('pass');
		try {
			$ver = $this->mlUser->validarPass($mail, $pw);
			if ($ver) {
				echo '{"status":"ok"}';
			} else {
				echo '{"status":"err"}';
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	public function menu2()
	{
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('menu');
		$this->load->view('../views/complementos/footer');
	}
	public function logout()
	{		// destory session
		$this->session->sess_destroy();
		redirect(base_url('index.php/cllUser/login'));
	}
	public function result()
	{
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('result');
		$this->load->view('../views/complementos/footer');	
	}
}
