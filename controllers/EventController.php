<?php

class EventController extends BaseController {
	
	public function list() {
		$this->data['events'] = Event::getEventList();
		$this->app->render('sometemplate.php', $this->data);
	}

	# GET /event/1
	public function view($id) {

	}

	# GET /event/create
	public function create() {

	}

	# POST /event
	public function store(){

	}

	# POST /event/1/approve
	public function approve($id) {
		
	}
}