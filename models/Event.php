<?php

class Event extends Model {
	// mapped to database fields
	public $id ; //not null
	public $title; //not null
	public $description; //not null
	public $tags;
	public $room_id;
	public $start_time;
	public $end_time;
	public $proposed_at; //not null
	public $proposed_by;
	public $approved_at='2015-04-25 12:12:12';
	public $approved_by;
	public $status = "pending";
	public $applicants = 2; //not null
	public $facebook_link;
	public $twitter_link;

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$this->proposed_at = $this->current_time();
			$stmt = Event::$db->prepare(
				"INSERT INTO `events` (`title`, `description`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `facebook_link`, `twitter_link`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("sssissisississ", $this->title, $this->description, $this->tags, $this->room_id, $this->start_time, $this->end_time, $this->proposed_at, $this->proposed_by, $this->approved_at, $this->approved_by, $this->status, $this->applicants, $this->facebook_link, $this->twitter_link);
				if ( !$stmt->execute() ){
					throw new Exception($stmt->error);
					return false;
				}

				$this->id = $stmt->insert_id;
				return true;
			}

		}
		else {
			// TODO: Update record
			throw new Exception('Update not implemented yet.');
		}

	}

	public function validate() {
		// TODO: Validate fields
		return true;
	}

	public static function getEventById($id) {
		Event::db_init();
		$result = Event::$db->query("SELECT `id`, `title`, `description`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `facebook_link`, `twitter_link` FROM `events` WHERE `id` = $id LIMIT 1");
		if ($result->num_rows == 0) {
			throw new Exception('No such event.');
		}
		$event = $result->fetch_object('Event');
		$event->new_record = false;
		return $event;
	}

	public static function getEventList(){
		Event::db_init();
		$result = Event::$db->query("SELECT `id`, `title`, `description`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `facebook_link`, `twitter_link` FROM `events`");

		$events = array();
		while($event = $result->fetch_object('Event')){
			$events[] = $event;
		}
		return $events;
	}
}
