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
		$this->app->render('create_event.php', $this->data);
	}

	# POST /event
	public function store(){
		$app = $this->app;
		$params = $this->getParams();

		$event = new Event(true);
		$event->id = $params['id'];
		$event->title = $params['title'];
		$event->description = $params['description'];

		if($event->save()){
			$app->flash('info', 'Request sent.');
			$app->redirect($app->urlFor('home'));
		} else {
				$app->flash('warning', 'There was an error with the request');
				$app->redirect($app->urlFor('create_event'));
		}
	}

	# POST /event/1/approve
	public function approve($id) {
		
	}
}
