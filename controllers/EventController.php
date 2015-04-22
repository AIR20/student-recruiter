<?php

class EventController extends BaseController {
	
	public function index() {
		$this->data['events'] = Event::getEventList();
		$this->app->render('event.php', $this->data);
	}

	# GET /event/1
	public function view($id) {
		$this->data['event'] = Event::getEventById($id);
		$this->app->render('event_details.php', $this->data);
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