<?php

namespace Mini\Controller;

use Mini\Core\Controller;

class LoginController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->view->addData(['titulo' => 'Login']);
	}

	public function index()
	{
		echo $this->view->render('login/index');
	}

	public function dologin()
	{
		if (Login::dologin($_POST)) {
			echo $this->view->render('login/usuariologueado');
		} else {
			echo $this->view->render('login/index');
		}
	}
}