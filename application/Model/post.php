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

// Hacer un getById.
// Get y Set.
// Funcion nuevo post.

}



?>