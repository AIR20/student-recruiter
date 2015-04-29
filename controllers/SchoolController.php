<?php

Class SchoolController extends BaseController {

	function store() {
		$app = $this->app;
		$params = $this->getParams();

		$school = new School(true);
		$school->name = $params['name'];
		$school->school_type = $params['school_type'];
		$school->address_line1 = $params['addr1'];
		$school->address_line2 = $params['addr2'];
		$school->address_line3 = $params['addr3'];
		$school->postcode = $params['postcode'];
		$school->tel = $params['phone'];

		if ($school->save()) {
			$app->flash('info', 'School was added successfully.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'Error. School was not added.');
			$app->redirect($app->urlFor('add_school'));
		}
	}	
}
