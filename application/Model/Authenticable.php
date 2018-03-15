<?php 


namespace Mini\Model;

use Mini\Core\Model;

class Authenticable{
	
	private $email;
	private $md5pass;

	protected function __construct($email, $password){
		$this->email = $email;
		$this->md5password = md5($password);
	}

	public function getEmail() {
		return $this->email;
	}

	public function auth($pass){
		return ($this->md5pass == md5($pass));
	}

	public static function getByEmail($email){
		$db = (new Model())->db;

		$tableName = strtolower(get_called_class());
		$tableName = (array_reverse(explode('\\',$tableName)))[0];

		$sql = "SELECT * FROM ".$tableName." WHERE email = '".$email."'";
		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();

		if (count($result)>0){
			return $result[0];
		}else{
			return false;
		}
	}

}


 ?>