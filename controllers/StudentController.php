<?php

class StudentController extends BaseController {

	# GET /student/register
	function register() {
		$this->loadDropzone();
		$this->loadJs('validator.min.js');
		$this->data['schools'] = School::getSchoolList();
		$this->app->render('student_register.php', $this->data);
	}

	# GET /student/events
	function listEvent() {
		$this->app->response->headers->set('Content-Type', 'application/json');
		if (isset($this->user) && $this->user->isStudent()) {
			$ret = array(
				'id' => array()
			);
			$events = $this->user->getEventList();
			foreach ($events as $e) {
				$ret['id'][] = $e->id;
			}
			echo json_encode($ret);
		} else {
			$this->app->response->setStatus(400);
		}
	}

	# POST /student
	function store() {
		$app = $this->app;
		$params = $this->getParams();

		$student = new Student(true);
		$student->firstname = $params['fname'];
		$student->lastname = $params['lname'];
		$student->email = $params['email'];

		// TODO: Should use hashed password
		$student->hashed_password = $params['password'];
		$student->gender = $params['gender'];

		// convert date format
		$student->dob = $this->convertDate($params['dob']);

		$student->avatar = $params['avatar'];
		$student->address_line1 = $params['addr1'];
		$student->address_line2 = $params['addr2'];
		$student->address_line3 = $params['addr3'];
		$student->postcode = $params['postcode'];

		$student->school_id = $params['school_id'];

		if ($student->save()) {
			$app->flash('info', 'Register successfully.');
			$app->redirect($app->urlFor('home'));
		} else {
			$app->flash('warning', 'The form cannot be submitted due to some errors.');
			$app->redirect($app->urlFor('student_register'));
		}
	}
}
