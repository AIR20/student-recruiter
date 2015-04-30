<?php

Class RoomController extends BaseController {

	function store() {
		$app = $this->app;
		$params = $this->getParams();

		$room = new Room(true);
		$room->name = $params['name'];
		$room->code = $params['code'];
		$room->building_id = $params['building_id'];
		$room->size = $params['size'];
		
		if ($room->save()) {
			$app->flash('info', 'Room was added successfully.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'Error. Room was not added.');
			$app->redirect($app->urlFor('add_room'));
		}
	}	
}
