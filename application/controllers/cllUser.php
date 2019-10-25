<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cllUser extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mldb2');
	}

	public function login(){
		$this->load->view('../views/complementos/header');
		$this->load->view('user');
		$this->load->view('../views/complementos/footer');
	}
	public function registrarUser($datos)
	{
		
	}

	
}
