<?php
//Tec de Teziutlán 22 de octubre del 2019
defined('BASEPATH') OR exit('No direct script access allowed');
// En esta clase se ejecutan las operaciones de la tabla de Gerencias
class cllGerencias extends CI_Controller {
	
	 function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mlGerencias');
		$this->load->library('session'); 		
	}
	public function index(){// cuando se accede hasta este controler este metodo es el que se ejecuta primero
		$datos['datos'] = $this->mlGerencias->listarGerencias();// Se enlistan todas las gerencias
		if ($datos !=null) {// se pregunta si existe por los menos una gerencia
			$Navbar['verNav'] = true;//Se carga la vista de gerencias
			$this->load->view('../views/complementos/header', $Navbar);
			$this->load->view('Gerencias',$datos);//Se le pasa la lista de gerencias 
			$this->load->view('../views/complementos/footer');// se carga el pie de pagina
		} else {// si no es asi solo se carga la vista de gerencias
			$this->load->view('../views/complementos/header');// se carga el footer 
			$this->load->view('Gerencias');// se carga el body 
			$this->load->view('../views/complementos/footer');//se carga el pie de pagina
		}
	}
	public function insertGerencia(){//En esta funion se almacenan la gerencias
		$datos = array(
			'Nombre' => $this->input->post('txtNombre'),
			'Descripcion' => $this->input->post('txtDesc')
		);// los datos que llegan por post se almacen en este arreglo
		$verificar = $this->mlGerencias->InsertarGeren($datos);// se almacena en la base de datos
		if ($verificar == true) {// si el insert fue un exito
			redirect(base_url('index.php/cllGerencias'));// se redireccina a la vista de las gerencias
			
		} else {//si es asi manda un error
			echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
		}
					
	}
	public function Edit($idg)//Es funcion es para editar una gerencia 
	{
		$params = array('IdGerencia' => $idg);// Se recupera el id de gerencia selecionada
		$datos['datos'] = $this->mlGerencias->listarGerencias();//Se almacena la gerencia
		$datos['gerencia'] = $this->mlGerencias->Edit($params);// se enlistan todas las gerencias
		if ($datos!=null) {// Se pregunta si existe la gerencia
			$this->load->view('../views/complementos/header');// se carga el encabezado
			$this->load->view('Gerencias', $datos);// se carga el body con la lista todas las gerencias
			$this->load->view('../views/complementos/footer');// se carga el pie de pagina 
		} else {
			$this->load->view('../views/complementos/header');
			$this->load->view('Gerencias');
			$this->load->view('../views/complementos/footer');
		}
		

	}
	public function modificarGerencia()//Esta funcion es hacer una actulizacion a una gerencia
	{
		$parametros = array(
			"Nombre" => $this->input->post('txtNombreM'),
			"Descripcion" => $this->input->post('txtDesM')
		);// se almacenan los datos enviados por post en este arreglo
		$idge = $this->input->post('txtIdG');//Se obtiene el id de la gerencia
		$verificar = $this->mlGerencias->ActuaizarGerencia($parametros, $idge);//se le pasa el id y los datos para modificarlos en la base de datos 
		if ($verificar===true) {// se pregunta si se actualizo correctamen
			redirect(base_url('index.php/cllGerencias'));// se redirecciona a la base vista de gerencias
		} else {//Si la operacion fallo se va a mostrar un error
			echo '<div class="alert alert-danger" role="alert">
							Error Verifique que los datos sean correctos.
							</div>';
		}
		
	}
	public function delete($idg){//Esta funcion es para eliminar una gerencia
		$parametros = array("IdGerencia" => $idg);//Se obtiene el id de la gerencia
		$validar = $this->mlGerencias->eliminar($parametros);//Se ejecuta el delete
		if ($validar===true) {// si la operacion fue un exito 
			redirect(base_url('index.php/cllGerencias'));// se redirecciona a la pagina de gerencias
		} else {// manda un error
			echo 'Error';
		}
		
	}


}
