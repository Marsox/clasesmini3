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
			header('Location: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Location: '.URL);
			}else{
				require APP.'view/_templates/header.php';
				require APP.'view/post/createpostform.php';
				require APP.'view/_templates/footer.php';
			}
		}
	}

	public function actionCrear(){
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Location: '.URL);
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
					header('Location: '.URL.'post/crear');
				}
			}
		}
	}

	public function detalle($id){
		$post = Post::getById($id);
		if ($post!= false && !$post->isPublic && !isset($_SESSION['user'])) {
			header('Location: '.URL);
		}else{
			require APP.'view/_templates/header.php';
			require APP.'view/post/detalle.php';
			require APP.'view/_templates/footer.php';
		}
	}

	public function editar($id) {
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Location: '.URL);
			}else{
				$post = Post::getById($id);
				if ($post != false) {
					require APP.'view/_templates/header.php';
					require APP.'view/post/createpostform.php';
					require APP.'view/_templates/footer.php';
				}else{
					header('Location: '.URL);
				}
			}
		}
	}

	public function actionEditar($id){
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Location: '.URL);
			}else{
				$post = Post::getById($id);
				if($post == false){
					header('Location: '.URL);
				}else{
					if ($post->getEmailAuthor() != $_SESSION['user']->getEmail()) {
						header('Location: '.URL.'post/detalle/'.$id);
					}else{
						$titulo = $_POST['titulo'];
						$cuerpo = $_POST['cuerpo'];
						$urlImagen = $_POST['urlImagen'];

						if(true){//Comprobaciones aqui
							
							$post->setTitulo($titulo);
							$post->setCuerpo($cuerpo);
							$post->setUrlImagen($urlImagen);

							$post->update();

							header('Location: '.URL.'post/detalle/'.$id);
						}else{
							header('Location: '.URL.'post/editar/'.$id);
						}
					}
				}
			}
		}
	}

	public function borrar($id){
		if (!isset($_SESSION['user'])) {
			header('Location: '.URL.'profesor/login');
		}else{
			if (!get_class($_SESSION['user']) == 'Mini\Model\Profesor') {
				header('Location: '.URL);
			}else{
				$post = Post::getById($id);
				if($post == false){
					header('Location: '.URL.'post/'.$_SESSION['user']->getEmail());
				}else{
					if ($post->getEmailAuthor() != $_SESSION['user']->getEmail()) {
						header('Location: '.URL.'post/detalle/'.$id);
					}else{
						$post->borrar();
						header('Location: '.URL.'post/'.$_SESSION['user']->getEmail());
					}
				}
			}
		}
	}

}



?>