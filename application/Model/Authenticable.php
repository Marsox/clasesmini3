<?php 


namespace Mini\Model;

use Mini\Core\Model;

class Authenticable{
	
	public $email;
	public $md5pass;

	public function getEmail() {
		return $this->email;
	}

	public function auth($pass){
		return ($this->md5pass == md5($pass));
	}

	public static function getByEmail($email){
		$db = (new Model())->db;

		$tableName = strtolower(get_called_class());
		$tableName = array_reverse(explode('\\',$tableName))[0];

		$sql = "SELECT * FROM ".$tableName." WHERE email = '".$email."'";
		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();

		if (count($result)>0){
			$class = get_called_class();
			$a = new $class();
			foreach ($result[0] as $field => $value) {
				$a->$field = $value;
			}
			return $a;

		}else{
			return false;
		}
	}

}


 ?>