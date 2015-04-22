<?php

class AccountController extends BaseController {


	# GET /authenticate
	function display(){
		if(isset($_SESSION['user'])){
		$this->data['user'] = User::getUserById($_SESSION['user']);
		$this->app->render('account_detail.php', $this->data);
		} else {
			$this->app->flash('error', 'Please login first');
			$this->app->redirect($this->app->urlFor('login'));
		}
	}
	

}