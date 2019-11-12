
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cllRespuestas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
	}

	public function insertar()
	{
		print_r($_POST);
	}
	

}
