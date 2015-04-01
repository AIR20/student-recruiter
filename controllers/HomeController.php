<?php

Class HomeController extends BaseController {
	function welcome(){
		$this->data['username'] = "SRS";
		$this->app->render('welcome.php', $this->data);
	}
}