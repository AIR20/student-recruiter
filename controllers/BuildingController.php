<?php

Class DepartmentController extends BaseController {
  function add_department(){
    $this->app->render('add_department.php', $this->data);
	}

	function store() {
		$app = $this->app;
		$params = $this->getParams();

		$department = new Department(true);
		$department->name= $params['name'];
		$department->building= $params['building_id'];
		$department->address_line1 = $params['addr1'];
		$department->address_line2 = $params['addr2'];
		$department->address_line3 = $params['addr3'];
		$department->postcode = $params['postcode'];
		$department->tel = $params['phone'];

		if ($department->save()) {
			$app->flash('info', 'Department was added successfully.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'Error. Department was not added.');
			$app->redirect($app->urlFor('add_department'));
		}
	}	
}
