<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cllFelicitaciones extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlFelicitaciones');
	}

	public function insertarfel(){
		$datos = array(
			'Felicitacion' => $this->input->post('txthappy')
			);
			$verificar= $this->mlFelicitaciones->insertHappy($datos);
			if ($verificar==true) {
			$this->load->view('../views/complementos/header');
			$this->load->view('home'); {
				$this->load->view('../views/complementos/footer');
			}
			} else {
				echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
			}
					
	}
	
}
