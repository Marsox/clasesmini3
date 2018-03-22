<?php 

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Alumno;

class AlumnoController extends Controller {

	public function index() {
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'alumno/login');
		}else{
			require APP.'view/_templates/header.php';
			echo "Bienvenido, Alumno!";
			require APP.'view/_templates/footer.php';
		}
	}

	public function login() {
		session_start();
		if (isset($_SESSION['user'])) {
			header('Location: '.URL.'alumno');
		} else {
			require APP.'view/_templates/header.php';
			require APP.'view/alumno/loginform.php';
			require APP.'view/_templates/footer.php';
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
					$_SESSION['iser'] = $alumno;
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
		session_start();
		session_destroy();
		header('Location: '.URL.'alumno');
	}

	public function register($errors = array()) {
		session_start();
		if (isset($_SESSION['user'])) {
			header('Location: '.URL.'alumno');
		} else {
			require APP.'view/_templates/header.php';
			require APP.'view/alumno/registerform.php';
			require APP.'view/_templates/footer.php';
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