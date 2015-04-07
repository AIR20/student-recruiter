<?php

Class HomeController extends BaseController {
	
	# GET /
	function welcome(){
		$this->app->render('welcome.php', $this->data);
	}
	
}