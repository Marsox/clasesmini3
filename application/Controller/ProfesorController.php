<?php 

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Profesor;

class ProfesorController extends Controller {

	public function index(){
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor/login');
		}else{
			require APP.'view/_templates/header.php';
			echo "Bienvenido, Profesor!";
			require APP.'view/_templates/footer.php';
		}
	}

	public function login(){
		session_start();
		if (isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor');
		}else{
			require APP.'view/_templates/header.php';
			require APP.'view/profesor/loginform.php';
			require APP.'view/_templates/footer.php';
		}
	}

	public function actionLogin(){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		if (!empty($email) && !empty($pass)) {
			$profesor = Profesor::getByEmail($email);
			if ($profesor !== false) {
				if ($profesor->auth($pass)) {
					session_start();
					$_SESSION['user'] = $profesor;
					header('Location: '.URL.'profesor');
				}else{
					header('Location: '.URL.'profesor/login');
				}
			}else{
				header('Location: '.URL.'profesor/login');
			}
		}else{
			header('Location: '.URL.'profesor/login');
		}
	}

	public function actionLogout(){
		session_destroy();
		header('Location: '.URL.'profesor');
	}

	public function register($errors = array()){
		session_start();
		if (isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor');
		}else{
			require APP.'view/_templates/header.php';
			require APP.'view/profesor/registerform.php';
			require APP.'view/_templates/footer.php';
		}
	}

	public function actionRegister(){
		$email = $_POST['email'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		$departamento = $_POST['departamento'];
		if(!empty($email) && !empty($nombre) && !empty($apellidos) && !empty($pass) && !empty($pass2) && !empty($departamento)){
			$profesor = Profesor::nuevoProfesor($email, $nombre, $apellidos, $pass, $departamento);
			if ($profesor !== false) {
				$_SESSION['user'] = $profesor;
				header('Location: '.URL.'profesor');
			}else{
				$this->register();
			}
		}else{
			$this->register();
		}
	}

}

?>