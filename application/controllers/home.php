<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');
//Se encarga del menu del cliente
class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlPreguntas');
		$this->load->library('session'); 
	}
	public function index()
	{//Carga la vista principal del cliente
		$Navbar['verNav'] =false;// se oculta la navbar
		$this->session->sess_destroy();//las varibles de secion se destruyen para evitar errores
		$this->load->view('../views/complementos/header',$Navbar);
		$this->load->view('home'); {//se carga la vista de home
			$this->load->view('../views/complementos/footer');// se carga la vista de footer
		}
	}
	public function fel()//Es es la vista de las felicitaciones
	{
		$Navbar['verNav'] = false;
		$this->load->view('../views/complementos/header',$Navbar);
		$this->load->view('felicitaciones');
		$this->load->view('../views/complementos/footer');
	}
	
	public function cargarPreguntas()
	{
		$this->load->view('../views/complementos/header');
		$datosPreguntas['allPreguntas'] = $this->mlPreguntas->getPreguntas();
		$this->load->view('encuesta', $datosPreguntas);
		$this->load->view('../views/complementos/footer');
	}
	public function encuesta()//Se cargar la vista encuestas
	{
		$this->load->view('../views/complementos/header');//Se carga el header
		$this->load->view('encuesta');//Se carga el body
		$this->load->view('../views/complementos/footer');//Se carga el pie de pagina
	}

	public function menu()
	{
		$this->load->view('../views/complementos/header');
		$this->load->view('menu');
		$this->load->view('../views/complementos/footer');
	}
	public function reservacion()// Se carga la vista donde se pide la la usuario consultar su informacion
	{
		$Navbar['verNav'] = false;//Se oculta el navbar al cliente
		$this->load->view('../views/complementos/header', $Navbar);//Se carga el header
		$this->load->view('reservacion');//Se carga el body
		$this->load->view('../views/complementos/footer');//Se carga el pie de pagina
	}
	public function game()//Carga la vista del juego
	{
		$Navbar['verNav'] = false;// Se oculta el navbar de la vista principal
		$this->load->view('../views/complementos/header', $Navbar);// Se carga la vista del header
		$this->load->view('game');// Se carga la vista del body
		$this->load->view('../views/complementos/footer');// Se carga la vista del footer
	}
}
