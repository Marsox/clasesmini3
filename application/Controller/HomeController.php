<?php 

namespace Mini\Controller;

use Mini\Core\Controller;

class HomeController extends Controller {

	public function index() {
		require APP.'view/_templates/header.php';
		require APP.'view/home/index.php';
		require APP.'view/_templates/footer.php';
	}


}


?>