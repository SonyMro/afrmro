<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') or exit('No direct script access allowed');
//En esta clase se ejecutan todas las operaciones de la tabla felicitaciones
class cllFelicitaciones extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlFelicitaciones');
	}

	public function insertarfel(){ // En esta funcion se almacenan la felicitaciones
		$datos = array(
			'Felicitacion' => $this->input->post('txthappy')
			);// se recupera la feliciatacion enviada desde el form
			$verificar= $this->mlFelicitaciones->insertHappy($datos);// se verifica que el insert se correcto
			if ($verificar==true) {// validad el insert se haya ejecutado
			$this->load->view('../views/complementos/header');//se carga el encabezado
			$this->load->view('home'); {// se carga el body 
				$this->load->view('../views/complementos/footer');// se carga el pie de pagina
			}
			} else {// si no es asi manda un alerta
				echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
			}
					
	}
	public function getFelicitaciones() //Se carga la vista de de feliciataciones
	{
		$ver = $this->mlFelicitaciones->feliciataciones();
		if ($ver != null) {
			$Navbar['verNav'] = true;
			$dat['fel']=$ver;
			$this->load->view('../views/complementos/header', $Navbar); //se carga el encabezado  feliciataciones()
			$this->load->view('vmfelicitaciones', $dat); // se carga el body 
			$this->load->view('../views/complementos/footer'); // se carga el pie de pagina
		} else { 
				$Navbar['verNav'] = true;
			$this->load->view('../views/complementos/header', $Navbar); //se carga el encabezado  feliciataciones()
			$this->load->view('vmfelicitaciones'); // se carga el body 
			$this->load->view('../views/complementos/footer'); // se carga el pie de pagina
		}
	} 
		
	
}
