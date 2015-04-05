<?php

Class HomeController extends BaseController {
	function welcome(){
		$this->app->render('welcome.php', $this->data);
	}
}