<?php 

namespace Mini\Controller;

use Mini\Core\Controller;

class ErrorController extends Controller
{
	
	public function index(){
		$this->view->addData(['titulo' => 'Error']);
		echo $this->view->render('error/index');
	}
}

 ?>