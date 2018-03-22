<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Profesor extends Authenticable{

	public $nombre;
	public $apellidos;
	public $departamento;

	public static function nuevoProfesor($email, $nombre, $apellidos, $pass, $departamento){

		if (self::getByEmail($email) !== false){
			return false;
		}else{
			$db = (new Model())->db;

			$sql = "INSERT INTO profesor (email, nombre, apellidos, md5password, departamento) 
														VALUES (:email, :nombre, :apellidos, :md5password, :departamento) ";
			$query = $db->prepare($sql);
			$parameters = array(':email' => $email, ':nombre' => $nombre, ':apellidos' => $apellidos, ':md5password' => md5($pass), ':departamento' => $departamento);

			$query->execute($parameters);

			return self::getByEmail($email);
		}

	}
	
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellidos() {
		return $this->apellidos;
	}
	public function getDepartamento() {
		return $this->departamento;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}
	public function setDepartamento($departamento){
		$this->departamento = $departamento;
	}

}

?>