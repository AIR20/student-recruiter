<?php

Class HomeController extends BaseController {
	function welcome(){
		$this->data['username'] = $this->app->request->getPathInfo();
		$this->app->render('welcome.php', $this->data);
	}
}