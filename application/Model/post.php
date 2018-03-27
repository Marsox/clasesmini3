<?php 

namespace Mini\Model;

use Mini\Core\Model;


class Post {
	
	public $id;
	public $titulo;
	public $cuerpo;
	public $urlImagen;
	public $isPublic = false;
	public $fecha;
	public $emailAuthor;


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

// Hacer un getById.
// Get y Set.
// Funcion nuevo post.

}



?>