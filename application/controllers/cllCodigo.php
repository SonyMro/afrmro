<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cllCodigo extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlCodigo');
		$this->load->library('session');
	}
	public function index()
	{
		$Navbar['verNav'] = true;
		$this->load->view('../views/complementos/header', $Navbar);
		$this->load->view('code');
		$this->load->view('../views/complementos/footer');
	}
	public function getCode()
	{
		header("Content-Type: application/json");	
		$ver=$this->mlCodigo->allCode();
		if ($ver!=null) {
			$datos['status']="ok";
			$datos['result']=$ver;
			echo json_encode($datos);
		} else {
			echo '{"status":"err","result":"vacio" }';			
		}		
	}
	public function buscarCode()
	{	$cod=$this->input->post('code');
		header("Content-Type: application/json");
		$ver = $this->mlCodigo->PorCode($cod);
		if ($ver != null) {
			$datos['status'] = "ok";
			$datos['result'] = $ver;
			echo json_encode($datos);
		} else {
			echo '{"status":"err","result":"vacio" }';
		}		
	}
	public function canje()
	{
		$id = $this->input->post('id');
		$ver=$this->mlCodigo->Canjeado($id);
		if ($ver) {
			echo '{"status":"ok"}';
		} else {
			echo'{"status":"err"}';
		}
		
	}
 }
