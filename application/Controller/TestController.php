<?php 

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Alumno;
use Mini\Model\Profesor;

class TestController extends Controller{
	
	public function getAlumno($email){
		echo json_encode(Alumno::getByEmail($email));
		echo get_class(Alumno::getByEmail($email));
	}

	public function session($action=""){
		session_start();
		if($action=="destroy"){
			session_destroy();
		}
		echo json_encode($_SESSION);
		if (isset($_SESSION['user'])) {
			echo get_class($_SESSION['user']);
		}
	}
	public function exampleProfesor(){
		echo json_encode(Profesor::getByEmail('asdfsa@gmail.com'));
	}
}

 ?>