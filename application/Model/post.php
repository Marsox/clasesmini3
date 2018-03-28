<?php 

namespace Mini\Model;

use Mini\Core\Model;


class Post {
	
	public $id;
	public $titulo;
	public $cuerpo;
	public $urlImagen;
	public $isPublic = true;
	public $fecha;
	public $emailAuthor;

	public static function nuevoPost($titulo, $cuerpo, $urlImagen, $isPublic, $fecha, $emailAuthor) {

		$db = (new Model())->db;

		$sql = "INSERT INTO post (titulo, cuerpo, urlImagen, isPublic, fecha, emailAuthor)
						VALUES (:titulo, :cuerpo, :urlImagen, :isPublic, :fecha, :emailAuthor)";
		$query = $db->prepare($sql);
		$parameters = array(':titulo' => $titulo, ':cuerpo' => $cuerpo, ':urlImagen' => $urlImagen, ':isPublic' => $isPublic, ':fecha' => $fecha, ':emailAuthor' => $emailAuthor);

		$query->execute($parameters);

		$id = $db->lastInsertId();

		return self::getById($id);
	}

	public static function getById($id){
		$db = (new Model())->db;
		$sql = "SELECT * FROM post WHERE id= '".$id."'";
		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();

		if (count($result)>0){
			$p = new Post();
			foreach ($result[0] as $field => $value) {
				$p->$field = $value;
			}
			return $p;

		}else{
			return false;
		}
	}


	public static function all(){
		$db = (new Model())->db;

		$sql = "SELECT * FROM post";
		$query = $db->prepare($sql);
		$query->execute();
		$dbResult = $query->fetchAll();
		$result = array();
		foreach ($dbResult as $postComoArray) {
			$p = new Post();
			foreach ($postComoArray as $field => $value) {
				$p->$field = $value;
			}
			array_push($result, $p);
		}
		return $result;

	}

	public static function allPublic(){
		$db = (new Model())->db;

		$sql = "SELECT * FROM post WHERE isPublic=1";
		$query = $db->prepare($sql);
		$query->execute();
		$dbResult = $query->fetchAll();
		$result = array();
		foreach ($dbResult as $postComoArray) {
			$p = new Post();
			foreach ($postComoArray as $field => $value) {
				$p->$field = $value;
			}
			array_push($result, $p);
		}
		return $result;
	}

	public static function getByAuthor($emailAuthor) {
		$db = (new Model())->db;
		$sql = "SELECT * FROM post WHERE emailAuthor= '".$emailAuthor."'";
		$query = $db->prepare($sql);
		$query->execute();
		$dbResult = $query->fetchAll();
		$result = array();
		foreach ($dbResult as $postComoArray) {
			$p = new Post();
			foreach ($postComoArray as $field => $value) {
				$p->$field = $value;
			}
			array_push($result, $p);
		}
		return $result;
	}

	public function update() {
		$db = (new Model())->db;
		$sql = "UPDATE post SET titulo = :titulo, cuerpo = :cuerpo, urlImagen = :urlImagen, isPublic = :isPublic, fecha = :fecha, emailAuthor = :emailAuthor WHERE id = '".$this->id."'";
		$query = $db->prepare($sql);
		$parameters = array(':titulo' => $this->titulo, 
												':cuerpo' => $this->cuerpo, 
												':urlImagen' => $this->urlImagen, 
												':isPublic' => $this->isPublic, 
												':fecha' => $this->fecha, 
												':emailAuthor' => $this->emailAuthor);
		$query->execute($parameters);
	}

	public function borrar() {
		$db = (new Model())->db;
		$sql = "DELETE FROM post WHERE id = '".$this->id."'";
		$query = $db->prepare($sql);
		$query->execute();
	}

	public function getId() {
		return $this->id;
	}
	public function getTitulo() {
		return $this->titulo;
	}
	public function getCuerpo() {
		return $this->cuerpo;
	}
	public function getUrlImagen() {
		return $this->urlImagen;
	}
	public function getIsPublic() {
		return $this->isPublic;
	}
	public function getFecha() {
		return $this->fecha;
	}
	public function getEmailAuthor() {
		return $this->emailAuthor;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	public function setCuerpo($cuerpo) {
		$this->cuerpo = $cuerpo;
	}
	public function setUrlImagen($urlImagen) {
		$this->urlImagen = $urlImagen;
	}
	public function setIsPublic($isPublic) {
		$this->isPublic = $isPublic;
	}
	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}


}



?>