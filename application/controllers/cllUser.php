<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class cllUser extends CI_Controller//Se hace las operaciones de la tbl de usuarios
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlUser');
		$this->load->library('session');
	}

	public function index()//El primer metodo que se ejecuta 
	{
		$datos['gerencias'] = $this->mlUser->listarGerencias();//Se enlistan todas las gerencias
		$datos['roles'] = $this->mlUser->listarRoles();//Se enlistan todos los roles
		$Navbar['verNav'] = true;//La variable para ver el navbar
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('Usuarios', $datos);// se carga el body con los parametros gerencia y de roles
		$this->load->view('../views/complementos/footer');
	}
	public function login()// El inicio de secion 
	{
	//	$this->session->sess_destroy();
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('user');//carga a vista del usuario
		$this->load->view('../views/complementos/footer');
	}
	public function registrarUser()//Registra el usuario
	{
		$data = array(
			'Nombre'  => $this->input->post('txtNombre'),
			'Apepat'  => $this->input->post('txtApepat'),
			'Apemat'  => $this->input->post('txtApemat'),
			'mail'  => $this->input->post('txtMail'),
			'pass'  => $this->input->post('txtPass'),
			'idGerencia'  => $this->input->post('slgerencias'),
			'idRol'  => $this->input->post('slRol')
		);//Se recuperan los datos del form
		$verificar = $this->mlUser->insertar($data);//Se alamacena en la base de datos 
		if ($verificar) {// si el insert de ejecuta con exito se carga la vista de registrar usuarios
			redirect(base_url('index.php/cllUser'));
		} else {
			redirect(base_url('index.php/cllUser'));
		}

		//$this->mlPremios->insert($data);
	}

	public function show()// Se muestran todos los usuarios
	{
		header("Content-Type: application/json");
		$datos = $this->mlUser->listarUsuarios()->result();// se en listan todos los usuarios
		echo json_encode($datos);//Se imprimen en la vista de Usuarios
	}
	public function EditUser()// Edita a un usuario
	{
		$parametros = array(
			"Nombre" => $this->input->post('MtxtNombre'),
			"Apepat" => $this->input->post('MtxtApepat'),
			"Apemat" => $this->input->post('MtxtApemat'),
			"mail" => $this->input->post('MtxtMail'),
			"idGerencia" => $this->input->post('Mslgerencias'),
			"idRol" => $this->input->post('MslRol')
		);//Se recuperan la infomarcion enviada en la base de datos
		$idUser = $this->input->post('MtxtId');//Se obtiene el id del usuario 
		$verificar = $this->mlUser->update($idUser, $parametros);//Se actualiza la informacion del usuario 
		if ($verificar === true) {//Si la actualizacion se ejecuto correctamente muestra la vista del usuario
			redirect(base_url('index.php/cllUser'));
		} else {//Si no es asi manda un error
			echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
			redirect(base_url('index.php/cllUser'));
		}
	}
	public function menu()// Este es el menu
	{
		$mail = $this->input->post('txtCorreo');//Se obtine el correo del usuario que inicio secion
		$pw = $this->input->post('txtPass');//Se obtine la contraseña del usuario
		$ver = $this->mlUser->usuario($mail, $pw);//Se consulta que el usuario exista en la base de datos
		if ($ver != false) {//Si existe el usuario existe de manda su informacion al menu
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
		} else {//Si no es no lo dejara entrar
			redirect(base_url('index.php/cllUser/login'));
		 }
	}
	/*Ajax */
	public function buscarPass()//Verifica que el usuario sea valido
	{
		header("Content-Type: application/json");
		$mail = $this->input->post('mail');//Obtiene el correo del usuario
		$pw = $this->input->post('pass');//Obtiene la contraseña del usuario
		try {
			$ver = $this->mlUser->validarPass($mail, $pw);//Verifica que el usuario exista en la base de datos
			if ($ver) {//Si el usuario existe manda ok a la vista
				echo '{"status":"ok"}';
			} else {// Si no es asi manda un error a la vista
				echo '{"status":"err"}';
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	public function menu2()//Se carga otras ves el menu para evitar errores
	{
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);//Se carga el header
		$this->load->view('menu');//Se carga el body
		$this->load->view('../views/complementos/footer');//Se carga el pie de pagina
	}
	public function logout()//Destruye las seciones activas
	{		// destory session
		$this->session->sess_destroy();//Se encargar de eliminar las variables de secion
		redirect(base_url('index.php/cllUser/login'));//Redireciona al login
	}
	public function result()//Carga la vista de los resultados
	{
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('result');
		$this->load->view('../views/complementos/footer');	
	}
}
