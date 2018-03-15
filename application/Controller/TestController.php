<?php 

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Alumno;
use Mini\Model\Profesor;

class TestController extends Controller{
	
	public function getAllAlumnos(){
		echo get_class((Alumno::all())[0]);
	}

	public function session(){
		session_start();
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