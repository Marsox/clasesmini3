<?php 

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