<?php 

use Mini\Core\Model;

class Profesor {

	private $email;
	private $nombre;
	private $apellidos;
	private $md5password;
	private $departamento;

	private function __construct($email, $nombre, $apellidos, $md5password, $departamento){
		$this->email = $email;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->md5password = $md5password;
		$this->departamento = $departamento;
	}

	public static function nuevoProfesor($email, $nombre, $apellidos, $pass, $departamento){

		if (self::getByEmail($email) !== false){
			return false;
		}else{
			
			$profesor = new Profesor($email, $nombre, $apellidos, md5($pass), $departamento);
			$sql = "INSERT INTO profesor (email, nombre, apellidos, md5password, departamento) 
														VALUES (:email, :nombre, :apellidos, :md5password, :departamento) ";
			$query = $this->db->prepare($sql);
			$parameters = array(':email' => $email, ':nombre' => $nombre, ':apellidos' => $apellidos, ':md5password' => $md5password, ':departamento' => $departamento);

			$query->execute($parameters);

			return $profesor;
		}

	}

	public static function getByEmail($email){
		$db = (new Model())->db;

		$sql = "SELECT * FROM profesor WHERE email = '".$email."'";
		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		if (count($result)>0){
			return $result[0];
		}else{
			return false;
		}
	}
	
	public function getEmail() {
		return $this->email;
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

	public function setEmail($email){
		$this->email = $email;
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