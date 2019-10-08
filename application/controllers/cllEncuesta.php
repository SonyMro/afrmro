<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cllEncuesta extends Cl_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index(){
		print('Hola ');
	}
	public function buscarReservacion(){
		$this->load->view('../views/complementos/header');
		$this->load->view('encuesta');
		$this->load->view('../views/complementos/footer');
	 }
}
