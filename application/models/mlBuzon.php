<?php
//Tec de Teziutlán 22 de octubre del 2019
class mlBuzon extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();//Se carga el archivo de database 
	}

	public function InsertarBuzon($datos)//Inserta una nueva queja
	{
		try {
			$this->db->insert('buzon', $datos);//Almacena la informacion en la tabla de buzon
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}

	public function ListarDatos()//Lista todas las quejar y sugerencias
	{
		$query = $this->db->query('SELECT b.IdBuzon,b.Nombre,b.apellidos,b.Edad,b.correo,b.telefono,b.direccion,b.codigoPostal,b.fecha,b.Recorrido,b.Recomendaccion,b.comentarios,b.IdGerencia,g.Nombre as gerencia  FROM buzon as b
inner join gerencias as g
on b.IdGerencia=g.IdGerencia;');
		if ($query->num_rows() > 0) {//Si hay por lo menos hay un registro  entra a esta condicion
			return $query->result();//Retorna la consulta
		} else {// Si no es asi retorna un null
			return null;
		}
	}
	public function getClaves()// Obtiene la lista de  de las palabras clave
	{
		$query = $this->db->query('select b.BuzonClave as idbc,b.palabra,b.IdGerencia,g.Nombre, u.Nombre as usuario, u.mail from buzonclave as b
inner join gerencias as g
on b.IdGerencia=g.IdGerencia
inner join usuarios as u
on g.IdGerencia=u.idGerencia;');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function insertarClave($datos)//Insert una nueva palabra clave 
	{
		try {
			$this->db->trans_start();
			$this->db->insert('buzonclave', $datos);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {//Si la trasacion falla retorna un false 
				return FALSE;
			} else {//Si el trans es un exito devuelve un true
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	public function updateclave($id, $da)//Actualiza las palbras clave se le pasa como parametro el id y los datos
	{
		try {
			$this->db->trans_start();
			$this->db->where('BuzonClave', $id);//Se busca el id de la palabra clave 
			$this->db->update('buzonclave', $da);//Se actualiza la palabra  clave
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {//Si falla la actualizacion manda un false
				return FALSE;
			} else {//Si la actualizacion es un exito manda un true
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	public function deleteClave($id)//Elimina una palabra clave
	{
		try {
			$this->db->trans_start();
			$this->db->query('delete from buzonclave where BuzonClave=' . $id . ';');//Se ejecuta el detele 
			$this->db->trans_complete();
			if ($this->db->trans_status() == FALSE) {//Si la transacion falla manda un error 
				return FALSE;
			} else {//si la trasacion es un exito manda un true
				return TRUE;
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
		}
	}
	public function allClaves()
	{
		$query =  $this->db->query('select b.BuzonClave as idbc,b.palabra,b.IdGerencia,g.Nombre from buzonclave as b
inner join gerencias as g
on b.IdGerencia=g.IdGerencia;');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function allGerencias()
	{
		$query =  $this->db->get('gerencias');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
}
