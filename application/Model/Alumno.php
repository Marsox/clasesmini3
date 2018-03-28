<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Alumno extends Authenticable{

	public $nombre;
	public $apellidos;
	public $curso;

	public static function nuevoAlumno($nombre, $apellidos, $email, $pass, $curso) {

		if (self::getByEmail($email) != false) {//Comprobamos si existe un usuario con ese email
			return false;//Y en ese caso, no lo podemos crear
		} else {
			$db = (new Model())->db;

			$sql = "INSERT INTO alumno (nombre, apellidos, email, md5password, curso)
							VALUES (:nombre, :apellidos, :email, :md5password, :curso) ";
			$query = $db->prepare($sql);
			$parameters = array(':nombre' => $nombre, ':apellidos' => $apellidos, ':email' => $email, ':md5password' => md5($pass), ':curso' => $curso);

			$query->execute($parameters);

			return self::getByEmail($email);

		}
	}

	public static function all(){
		$db = (new Model())->db;

		$sql = "SELECT * FROM alumno";
		$query = $db->prepare($sql);
		$query->execute();
		$dbResult = $query->fetchAll();
		$result = array();
		foreach ($dbResult as $alumnoComoArray) {
			$a = new Alumno();
			foreach ($alumnoComoArray as $field => $value) {
				$a->$field = $value;
			}
			array_push($result, $a);
		}
		return $result;
	}

	public function getNombre() {
		return $this->nombre;
	}
	public function getApellidos() {
		return $this->apellidos;
	}
	public function getCurso() {
		return $this->curso;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}
	public function setCurso($curso){
		$this->curso = $curso;
	}

}

?>