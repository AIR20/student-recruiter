<?php

class AccountController extends BaseController {


	# GET /authenticate
	function display(){
		$this->data['user'] = User::getUserById($_SESSION['user']);
		$this->app->render('account_detail.php', $this->data);
	}
	

}