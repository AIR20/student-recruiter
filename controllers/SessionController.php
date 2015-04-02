<?php

Class SessionController extends BaseController {
	function login(){
		$this->app->render('login.php', $this->data);
	}

	function authenticate(){

	}
	
	function logout(){
		$this->app->render('welcome.php', $this->data);
	}
}