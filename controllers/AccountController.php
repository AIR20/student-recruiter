<?php

class AccountController extends BaseController {


	# GET /authenticate
	function display(){
		if(isset($this->data['user'])){
			$this->data['events'] = $this->data['user']->getEventList();
			$this->app->render('account_detail.php', $this->data);
		} else {
			$this->app->flash('error', 'Please login first');
			$this->app->redirect($this->app->urlFor('login'));
		}
	}
	

}