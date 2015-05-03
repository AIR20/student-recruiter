<?php

Class StaffController extends BaseController {
	# GET /event/create
	function create_event()
	{
    	$this->app->render('create_event.php', $this->data);
	}

	# GET /admin/create_staff
	function register()
	{
		$this->app->render('create_staff.php', $this->data);
	}

	# GET /staff/events
	function listEvents()
	{
		$this->data['events'] = $this->data['user']->getEventList();
		$this->app->render('staff_events.php', $this->data);
	}

	function store()
	{
		$app = $this->app;
		$params = $this->getParams();

		$staff = new Staff(true);
		$staff->firstname = $params['fname'];
		$staff->lastname = $params['lname'];
		$staff->email = $params['email'];
		$staff->hashed_password = $params['password'];
		$staff->gender = $params['gender'];
		$staff->dob = $this->convertDate($params['dob']);
		$staff->department_id = $params['department_id'];
		$staff->phone = $params['phone'];

		if ($staff->save()) {
			$app->flash('info', 'Staff was added successfully.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'Error. Staff was not created.');
			$app->redirect($app->urlFor('create_staff'));
		}
	}	
}
