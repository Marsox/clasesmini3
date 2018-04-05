<?php 

namespace Mini\Model;

use Mini\Core\Model;


class Categoria{

	public $id;
	public $nombre;

	public static function getById($id){
		$db = (new Model())->db;
		$sql = "SELECT * FROM categoria WHERE id= '".$id."'";
		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();

		if (count($result)>0){
			$c = new Categoria();
			foreach ($result[0] as $field => $value) {
				$c->$field = $value;
			}
			return $c;

		}else{
			return false;
		}
	}

}