<?php 

namespace Mini\Controller;

use Mini\Core\Controller;

class ErrorController extends Controller
{
	
	public function index(){
		require APP .'view/_templates/header.php';
		require APP .'view/error/index.php';
		require APP .'view/_templates/footer.php';
	}
}

 ?>