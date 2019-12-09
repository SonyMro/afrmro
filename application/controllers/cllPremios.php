<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') OR exit('No direct script access allowed');//Esto nunca se deve barrar son dependencias que necesita el proyecto
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class cllPremios extends CI_Controller {
	
	 function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlPremios');
		$this->load->library('session'); 
		$this->load->database();	
	}
	public function index(){//El primer metodo que se ejecuta en esta clase
		$datos['datos'] = $this->mlPremios->listar();// se enlista todos los premios registrados
		if ($datos !=null) {//Se valida que exista por los menos un premios 
			$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('Premios',$datos);// se carga el body con todos los premios
			$this->load->view('../views/complementos/footer');
		} else {//De no ser asi se solo se carga la vista sin parametros
			$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('Premios');
			$this->load->view('../views/complementos/footer');
		}
	}

	function show(){
		header("Content-Type: application/json");		
		$datos= $this->mlPremios->listar()->result();
		echo json_encode($datos);
	}
	public function edit($id)//Edita un premio
	{	header("Content-Type: application/json");
		$datos = $this->mlPremios->editM($id)-> result();//hace la consulta a la base de datos
		if ($datos==false) {// si este premio no existe 
			$data = '{"result": false}';// manda un error
				echo $data;//imPrime el error
		} else {
			echo json_encode($datos);//manda el premio
		}
	}
	public function save()// almacena los premioss
	{
		$data = array(
			'Nombre'  => $this->input->post('Nombre'),
			'foto'  => $this->input->post('img'),
			'Descripcion'  => $this->input->post('des')
		);//obtiene los datos del form 
 $this->mlPremios->insert($data);// inserta el premio en la base de datos

	}
	public function code(){//Almacena el codigo del premio en la base de datos
		$data = array(
			'Idpremio'  => $this->input->post('IdPremio'),
			'codigo'  => $this->input->post('code')
		);// Obtiene los datos del codigo 
		$ver=$this->mlPremios->registrarCode($data); //El codigo se almacena en la base de datos 
		if ($ver) {//si la trasaccion se ejecuto con exito imprime un si
			echo 'Si';
		} else {
			echo 'No';
		}
		
	}
	public function eliminar($idp){//Elimina los premios registrados
		$parametros = array("IdPremio" => $idp);//Obtine el id del premio
	$verificar=	$this->mlPremios->detele($parametros);// elimina de la base de datos el premio registrado
	if ($verificar) {// si el premio se elimino se imprime un si 
			echo 'Si';
	} else {
			echo 'No';
	}
	
	}
	public function modificar()// modifica la infomarcion de los premios
	{
		$idusu = $this->input->post('Id');//Se optiene el id del premio
			$data = array(
				'Nombre'  => $this->input->post('Nombre'),
				'foto'  => $this->input->post('img'),
				'Descripcion'  => $this->input->post('des'),
				'Stock'  => $this->input->post('Stock'),
			);//se obtienen los datos del form
		$this->mlPremios->modificar($data, $idusu);//Se modifican la informacion del premio
	}

}
