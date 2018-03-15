<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Alumno extends Authenticable{

	private $nombre;
	private $apellidos;
	private $curso;

	protected function __construct($nombre, $apellidos, $email, $password, $curso) {
		parent::__construct($email, $password);
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->curso = $curso;
	}

	public static function nuevoAlumno($nombre, $apellidos, $email, $pass, $curso) {

		if (self::getByEmail($email) != false) {
			return false;
		} else {
			$db = (new Model())->db;

			$alumno = new Alumno($nombre, $apellidos, $email, $pass, $curso);
			$sql = "INSERT INTO alumno (nombre, apellidos, email, md5password, curso)
							VALUES (:nombre, :apellidos, :email, :md5password, :curso) ";
			$query = $db->prepare($sql);
			$parameters = array(':nombre' => $nombre, ':apellidos' => $apellidos, ':email' => $email, ':md5password' => md5($pass), ':curso' => $curso);

			$query->execute($parameters);

			return $alumno;

		}
	}

	public static function all(){
		$db = (new Model())->db;

		$sql = "SELECT * FROM alumno";
		$query = $db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
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