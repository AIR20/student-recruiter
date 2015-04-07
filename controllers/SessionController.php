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

		if (User::authenticate($email, $password)) {
			$app->flash('info', 'Successfully logged in.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('error', 'Wrong email and password combination.');
			$app->redirect($app->urlFor('login'));
		}
	}
	
	# POST /logout
	function logout(){
		// TODO: Logout
		throw new Exception('Not implemented.');
	}
}