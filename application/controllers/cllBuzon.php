
<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');
//en este controlador se hacen la connexiones a la base de datos de la tabla Buzon
class cllBuzon extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//se cargan las biblitecas y modelos
		$this->load->helper('url');
		$this->load->model('mlBuzon');
		$this->load->library('session');
	}
	public function QuejasSugerencias()
	{//todo el proyecto de divide en 3 componentes los cuales son header body, footer

		$Navbar['verNav'] = false;//se declara una variable para bloquear el navbar de todas las vistas
		$this->load->view('../views/complementos/header', $Navbar);//Apunta a la vista 
		$this->load->view('QuejasSugerencias');//carga los componentes de la vista en el body
		$this->load->view('../views/complementos/footer');//carga el footer 
	}
	public function insertarBuzon() //en este metodo se recupera las respuestas enviadas por post y se insertan a la base de datos
	{// la varible quejas es la tiene el formato del correo que se envia a los adminstradores de las gerencias
		$queja = '<b>Queja</b> <br>' . $this->input->post('txtQs') . ' <br>
Información. <br>
Nombre: ' . $this->input->post('txtNombre') . '  Edad: ' . $this->input->post('txtEdad') . ' <br>
Teléfono:' . $this->input->post('txtTel') . ' correo:' . $this->input->post('txtMail') . '<br>
Código Postal: ' . $this->input->post('txtCp') . ' <br>
Dirección ' . $this->input->post('txtDir') . '
';
		$cadena= $this->input->post('txtQs');// se obtine la queja del cliente 
		$idgere = $this->clasificar($cadena,$queja);// se manda a llamar la funcion clasificar y se le pasa la cadena y la queja
		$datos = array(//se declara un array el cual va alamacenar las todas las respuestas enviadas por post 
			'Nombre' => $this->input->post('txtNombre'),
			'apellidos' => $this->input->post('txtApes'),
			'Edad' => $this->input->post('txtEdad'),
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
		
		$this->mlBuzon->InsertarBuzon($datos);//se almacena en la base de datos
		/*	$Navbar['verNav'] = false;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('home'); {
			$this->load->view('../views/complementos/footer');
		}*/
		redirect(base_url());
	}
	public function listarBuzon()//se enlistan todas las quejas y sugerencias que estan alamacenadas en la base de datos
	{
		$datos['listaBuzon'] = $this->mlBuzon->ListarDatos();//se crea un array de todas las quejas
		$this->load->view('../views/complementos/header');
		$this->load->view('vwBuzon', $datos);// se carga la vista y se le pasa el parametro
		$this->load->view('../views/complementos/footer');
	}
	public function allBuzon()// en esta funcion se recuperan todas las quejas y sugerencias
	{
		$ver = $this->mlBuzon->ListarDatos();// se hace una consulta a la base de datos
		$Navbar['verNav'] = true;
		if ($ver != null) {// si las respuestas es diferente de vacia se le pasa como parametro todas las quejas y sugerencias
			$dat['buzon'] = $ver;//se declara un arreglo el cual va a tener todas las palabras clave
			$this->load->view('../views/complementos/header', $Navbar);// se carga el header 
			$this->load->view('buzon', $dat);// se carga el body 
			$this->load->view('../views/complementos/footer');// se carga el footer
		} else {
			$this->load->view('../views/complementos/header', $Navbar);// se carga el footer 
			$this->load->view('buzon');// se carga el body sin parametros
			$this->load->view('../views/complementos/footer');// se carga el footer 
		}
	}
	public function allClaves()// se enlistan todas las palabras clave que se resgistran en la base de datos
	{
		$ver = $this->mlBuzon->allClaves();// se obtinen las palabras clave de la base de dato 
		$Navbar['verNav'] = true;// se declara la varible para el navbar
		if ($ver != null) {// si no es nula se le va a pasar las palabras clave  
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
	public function inserclave()// insertar una palabra clave a la base de datos 
	{// se declara un arrglo con los parametros enviados por post
		$dat = array(
			'palabra' => $this->input->post('txtPal'),
			'IdGerencia' => $this->input->post('sGerencia')
			//sGerencia
		);
		$ver = $this->mlBuzon->insertarClave($dat);// se inserta en la base de datos 
		if ($ver) {// si la operacion se realizado con exito se carga la pagina donde se inserta
			redirect(base_url('index.php/cllBuzon/allClaves'));
		} else {
			redirect(base_url('index.php/cllBuzon/allClaves'));
		}
	}
	public function eliminarClave()//se eliminan la palabras clave 
	{
		$id = $this->input->post('txtid');// se optine la palabra clave por post
		$ver = $this->mlBuzon->deleteClave($id);// se elimina de la base de datos
		if ($ver) {
			redirect(base_url('index.php/cllBuzon/allClaves'));// redireciona a pagina donde se inserta
		} else {
			redirect(base_url('index.php/cllBuzon/allClaves'));
		}
	}


	public function clasificar($cadena,$queja)//En esta funcion se clasifican los las quejas de los clientes resibe dos paramatros los cuales son cadeja y queja
	{
		$claves = $this->mlBuzon->getClaves();// se obtinen todas las palabras clave de la base de datos 
		$idg = '';// se declara una varible auxiliar
		if ($claves != null && $cadena) {// se valida que ninguna venga nula
			foreach ($claves as $clave) {// se recorre todas la paralabras clave 
				//	explode(".", $str)
				$pos = strrpos($cadena, $clave->palabra);//se busca que en la cadena exista una palabra clave
				if ($pos === false) { // nota: tres signos de igual
					$idg = 1;//  por default toamara el uno 
				} else {
					$idg = $clave->IdGerencia;// se almacena id de la gerenacia 
					$correo= $clave->mail;// se almacena el correo del usuario que pertenesca a esta gerencia  
					//$this->en();
					$this->enviar($correo, $queja);//  se envia el correo 
					break;
				}
			}
		} else { 

		}
		return $idg;// se retorna el id de la gerencia
	}
/*	public function en()
	{	$correo= 'mro.hdpv@gmail.com';
		$queja= '<b>Queja</b> <br>
La guía fue muy grosera, el baño sucio, y pican los moscos. <br>
Información. <br>
Nombre: Mario Guzman Pérez.  Edad: 25 <br>
Teléfono: 5565196058. correo:sony15.mro@gmail.com<br>
Código Postal: 73800 <br>
Dirección calle lerdo de Texas.
';
		$this->enviar($correo,$queja);
	}*/

	public function enviar($correo,$queja)// en esta funcion se encarga de enviar los correos
	{
		if ($correo !=null || $correo=="") {// se valida que no vengan vacios
			$config['protocol']    = 'smtp';//el servidor que se ocupa es el smtp
			$config['smtp_host']    = 'ssl://smtp.gmail.com';// el host es el de gmail
			$config['smtp_port']    = '465';//el puerto
			$config['smtp_timeout'] = '7';// el tiempo de espera
			$config['smtp_user']    = 'correo de gmail';// correo auxiliar
			$config['smtp_pass']    = 'passwor';// contraseña
			$config['charset']    = 'utf-8';// formato web del correo 
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'text'; // o html
			$config['validation'] = TRUE; // para validar el correo electronico
			$this->load->library('email', $config);// se carga la biblioteca de gmail y se la para la configuracion del servidor smtp
			$this->email->initialize($config);// se inicia la configuracion
			$this->email->set_mailtype("html");//se le indica que acepte codigo html
			$this->email->from('correo de gmail', 'Queja o sugerencia de un cliente.');//corre auxiliar mas el encabezado del correo
			$this->email->to($correo);// persona al que la va a llegar el correo 
			$this->email->subject('Queja de un cliente.');// el asunto 
			$this->email->message($queja);// el mensaje 
			//$this->email->send();
			/**/if ($this->email->send()) {// valida si se envio el mensaje 
				echo 'Correcto';
			} else {
				echo 'Error';
			}	
		} else {
			
		}
		
	}
}
