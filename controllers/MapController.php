<?php

Class MapController extends BaseController {

	# GET /
	function display(){
		$this->loadMap();
		$this->app->render('map.php', $this->data);
	}

}
