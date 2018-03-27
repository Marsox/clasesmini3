<?php 

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Post;
use Mini\Model\Profesor;

class PostController extends Controller {

	public function index($profEmail=''){
		if (isset($_SESSION['user'])) {
			$posts = ($profEmail == '')? Post::all() : Post::getByAuthor($profEmail);
		}else{
			$posts = Post::allPublic();
		}
		require APP.'view/_templates/header.php';
		require APP.'view/post/lista.php';
		require APP.'view/_templates/footer.php';
			
	}

	public function crear() {
		if (!isset($_SESSION['user'])) {
			header('Locaticon: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Locaticon: '.URL);
			}else{
				require APP.'view/_templates/header.php';
				require APP.'view/post/createpostform.php';
				require APP.'view/_templates/footer.php';
			}
		}
	}

	public function actionCrear(){
		if (!isset($_SESSION['user'])) {
			header('Locaticon: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Locaticon: '.URL);
			}else{
				$titulo = $_POST['titulo'];
				$cuerpo = $_POST['cuerpo'];
				$urlImagen = $_POST['urlImagen'];
				$fecha = time() + 3600;
				$emailAuthor = $_SESSION['user']->getEmail();
				$isPublic = true;

				if(true){//Comprobaciones aqui
					$post = Post::nuevoPost($titulo, $cuerpo, $urlImagen, $isPublic, $fecha, $emailAuthor);
					header('Location: '.URL.'post/detalle/'.$post->id);
				}else{
					header('Locaticon: '.URL.'post/crear');
				}
			}
		}
	}

	public function detalle($id){
		$post = Post::getById($id);
		if (!$post->isPublic && !isset($_SESSION['user'])) {
			header('Location: '.URL);
		}else{
			require APP.'view/_templates/header.php';
			require APP.'view/post/detalle.php';
			require APP.'view/_templates/footer.php';
		}
	}
}



?>