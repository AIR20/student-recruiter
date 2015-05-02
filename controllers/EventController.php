<?php

class EventController extends BaseController {

	public function index() {
		$this->data['events'] = Event::getEventList();
		$this->app->render('event.php', $this->data);
	}
	
	# GET /event/1
	public function view($id) {
		if (isset($this->user) && $this->user->isStudent()) {
			$booked_events = $this->user->getEventList();
			$booked = false;
			foreach ($booked_events as $event) {
				if ($event->id == $id) {
					$booked = true;
					break;
				}
			}
		}
		$this->data['event'] = Event::getEventById($id);
		$this->data['event']->booked = $booked;
		$this->app->render('event_details.php', $this->data);
	}

	# GET /event/create
	public function create() {
        $this->data['buildings'] = Building::getBuildingList();
        $this->data['rooms'] = Room::getRoomList();
		$this->app->render('create_event.php', $this->data);
	}

	# GET /event/pending
	public function pending() {
		$this->data['pending_events'] = Event::getPendingEventList();
		$this->app->render('pending_events.php', $this->data);
	}

	# GET /event/:id/approve
	public function approve() {
		$this->app->render('approve_event.php', $this->data);
	}

	# GET /event/:id/reject
	public function reject() {
		$this->app->render('reject_event.php', $this->data);
	}

	# GET /event/:id/remove
	public function remove() {
		$this->app->render('remove_event.php', $this->data);
	}


	# POST /event
	public function store(){
		$app = $this->app;
		$params = $this->getParams();

		$event = new Event(true);
		$event->title = $params['title'];
		$event->description = $params['description'];
		$event->type = $params['type'];
		$event->tags = $params['tags'];
		$event->room_id = $params['room_id'];
		$event->start_time = $this->convertDate($params['date']) . ' ' . $params['start_time'] . ':00';
		$event->end_time = $this->convertDate($params['date']) . ' ' . $params['end_time'] . ':00';
		$event->proposed_at = $params['proposed_at'];
		$event->proposed_by = $params['proposed_by'];
		$event->approved_at = $params['approved_at'];
		$event->approved_by = $params['approved_by'];
		$event->status = 'pending'; 
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

	public function book($id){
		$e = Event::getEventById($id);
		$this->requireValidStudent();
		$result = $e->bookEvent($this->data['user']->id);
		if ($result == 1) {
			if ($this->app->request->isXhr()) {
				$ret = array('id' => $id);
				$this->app->response->headers->set('Content-Type', 'application/json');
				echo json_encode($ret);
				return;
			}
			$this->app->flash('info', 'Successfully Booked Event.');
			$this->app->redirect($this->app->urlFor('list_event'));
		} else {
			if ($this->app->request->isXhr()) {
				$this->app->response->setStatus(400);
				$this->app->response->headers->set('Content-Type', 'application/json');
				return;
			}
			$this->app->flash('error', 'Booking UNSUCCESSFUL.');
			$this->app->redirect($this->app->urlFor('list_event'));
		}
	}

	public function unbook($id){
		$e = Event::getEventById($id);
		$this->requireValidStudent();
		$result = $e->unbookEvent($this->data['user']->id);
		if ($result == 1) {
			if ($this->app->request->isXhr()) {
				$ret = array('id' => $id);
				$this->app->response->headers->set('Content-Type', 'application/json');
				echo json_encode($ret);
				return;
			}
			$this->app->flash('info', 'Successfully Cancelled Booking.');
			$this->app->redirect($this->app->urlFor('account'));
		} else {
			if ($this->app->request->isXhr()) {
				$this->app->response->setStatus(400);
				$this->app->response->headers->set('Content-Type', 'application/json');
				return;
			}
			$this->app->flash('error', 'Booking Cancel UNSUCCESSFUL.');
			$this->app->redirect($this->app->urlFor('account'));
		}
	}

	# GET /event/search
	public function search() {
		$this->app->response->headers->set('Content-Type', 'application/json');
		$params = $this->app->request->get();
		$events = 
			Event::getFilteredEventList(array(
				'query' => $params['query'],
				'type'  => $params['type'],
				'tags'  => $params['tag']
			));
		$ret = array(
			'id' => array()
		);
		foreach ($events as $e) {
			$ret['id'][] = $e->id;
		}
		echo json_encode($ret);
	}

}
