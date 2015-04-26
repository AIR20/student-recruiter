<?php

Class MapController extends BaseController {
	
	# GET /
	function display(){
		$this->app->render('map.php', $this->data);
	}
	
}
