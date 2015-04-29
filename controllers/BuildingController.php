<?php

Class BuildingController extends BaseController {
  function add_building(){
    $this->app->render('add_building.php', $this->data);
	}

	function store() {
		$app = $this->app;
		$params = $this->getParams();

		$building = new Building(true);
		$building->name = $params['name'];
		$building->map_no = $params['map_no'];
		$building->longitude = $params['longitude'];
		$building->latitude = $params['latitude'];

		if ($building->save()) {
			$app->flash('info', 'Building was added successfully.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'Error. Building was not added.');
			$app->redirect($app->urlFor('add_building'));
		}
	}	
}
