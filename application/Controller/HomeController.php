<?php 

namespace Mini\Controller;

use Mini\Core\Controller;

class HomeController extends Controller {

	public function index() {
		$this->view->addData(['titulo' => "Bienvenido"]);
  	echo $this->view->render("home/index", []);
	}


}


?>