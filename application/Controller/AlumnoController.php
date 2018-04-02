<?php 

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Alumno;
use Mini\Model\Post;

class AlumnoController extends Controller {

	public function index() {
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'alumno/login');
		}else{
			$this->view->addData(['titulo'=>'Bienvenido Alumno', 'posts' => Post::all()]);
			echo $this->view->render('post/lista');
		}
	}

	public function login() {
		if (isset($_SESSION['user'])) {
			header('Location: '.URL.'alumno');
		} else {
			$this->view->addData(['titulo'=>'Login Alumno']);
			echo $this->view->render('alumno/loginform');
		}
	}

	public function actionLogin() {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		if (!empty($email) && !empty($pass)) {
			$alumno = Alumno::getByEmail($email);
			if ($alumno !== false ) {
				if ($alumno->auth($pass)) {
					session_start();
					$_SESSION['user'] = $alumno;
					header('Location: '.URL.'alumno');
				} else {
					header('Location: '.URL.'alumno/login');
				}
			} else {
				header('Location: '.URL.'alumno/login');
			}
		} else {
			header('Location: '.URL.'alumno/login');
		}
	}

	public function actionLogout() {
		session_destroy();
		header('Location: '.URL.'alumno');
	}

	public function register($errors = array()) {
		if (isset($_SESSION['user'])) {
			header('Location: '.URL.'alumno');
		} else {
			$this->view->addData(['titulo'=>'Registro Alumno']);
			echo $this->view->render('alumno/registerform');
		}
	}

	public function actionRegister() {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$pass =	$_POST['pass'];
		$pass2 = $_POST['pass2'];
		$curso = $_POST['curso'];
		if (!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($pass) && !empty($pass2) && !empty($curso)) {
			$alumno = alumno::nuevoAlumno($nombre, $apellidos, $email, $pass, $curso);
			if ($alumno !== false) {
				$_SESSION['user'] = $alumno;
				header('Location: '.URL.'alumno');
			} else {
				$this->register();
			}
		} else {
			$this->register();
		}
	}

}

?>