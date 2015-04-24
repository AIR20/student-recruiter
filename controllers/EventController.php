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
		$event->title = $params['title'];
		$event->description = $params['description'];
		$event->tags = $params['tags'];
		$event->room_id = $params['room_id'];
		$event->start_time = $params['start_time'];
		$event->end_time = $params['end_time'];
		$event->proposed_at = $params['proposed_at'];
		$event->proposed_by = $params['proposed_by'];
		$event->approved_at = $params['approved_at'];
		$event->approved_by = $params['approved_by'];
		$event->status = $params['status'];
		$event->facebook_link = $params['facebook_link'];
		$event->twitter_link = $params['twitter_link'];

		if($event->save()){
			$app->flash('info', 'Request sent.');
			$app->redirect($app->urlFor('home'));
		} else {
				$app->flash('warning', 'There was an error with the request');

				$app->redirect($app->urlFor('home'));
		}
	}

	# POST /event/1/approve
	public function approve($id) {

	}

	
	public function book($id){
		$e = Event::getEventById($id);
		if($e->bookEvent()==1){
			$this->app->flash('info', 'Successfully Booked Event.');
			$this->app->redirect($this->app->urlFor('home'));
		} else if($e->bookEvent()==0){
			$this->app->flash('error', 'BOOKING UNSUCCESSFUL BITCH');
			$this->app->redirect($this->app->urlFor('home'));
			} else {
			$this->app->flash('error', 'U ALRDY BOOKED THIS EVENT BITCH');
			$this->app->redirect($this->app->urlFor('home'));
			}
	}
	
}

