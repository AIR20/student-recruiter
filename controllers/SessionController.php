<?php

class SessionController extends BaseController {

	# GET /login
	function login(){
		$this->app->render('login.php', $this->data);
	}

	# POST /authenticate
	function authenticate(){
		$app = $this->app;

		$email = $app->request->post('email');
		$password = $app->request->post('password');
		//$app->redirect($app->urlFor('home'));

		if (User::authenticate($email, $password)) {
			//die("test 1");
			$app->flash('info', 'Successfully logged in.');
			
			$app->redirect($app->urlFor('home'));
		} else {
			//die("test 2");
			$app->flash('error', 'Wrong email and password combination.');
			
			$app->redirect($app->urlFor('login'));
		}
	}
	
	# POST /logout
	function logout(){
		// TODO: Logout
		unset($_SESSION['user']);
		$this->app->flash('error', 'You have successfully logged out!');
		$this->app->redirect($this->app->urlFor('home'));
		//throw new Exception('Not implemented.');
	}
}