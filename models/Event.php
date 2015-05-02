<?php

class Event extends Model {
	// mapped to database fields
	public $id;
	public $title;
	public $description;
	public $type;
	public $tags;
	public $room_id;
	public $date;
	public $start_time;
	public $end_time;
	public $proposed_at;
	public $proposed_by;
	public $approved_at;
	public $approved_by;
	public $status; 
	public $applicants = 0;
	public $twitter_link;

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$this->proposed_at = $this->current_time();
			$stmt = Event::$db->prepare(
				"INSERT INTO `events` (`title`, `description`, `type`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `twitter_link`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("ssssisssisisis", $this->title, $this->description, $this->type, $this->tags, $this->room_id, $this->start_time, $this->end_time, $this->proposed_at, $this->proposed_by, $this->approved_at, $this->approved_by, $this->status, $this->applicants, $this->twitter_link);
				if (!$stmt->execute()) return false;
				$this->id = $stmt->insert_id;
				return true;
			}

		}
		else {
			$stmt = Event::$db->prepare(
				"UPDATE `events` SET `title` = ?, `description` = ?, `type` = ?, `tags` = ?, `room_id` = ?, `start_time` = ?, `end_time` = ?, `proposed_at` = ?, `proposed_by` = ?, `approved_at` = ?, `approved_by` = ?, `status` = ?, `applicants` = ?, `facebook_link` = ?, `twitter_link` = ? WHERE `id` = ?"
			);
			if ($stmt) {
				$stmt->bind_param("ssssisssisisissi", $this->title, $this->description, $this->type, $this->tags, $this->room_id, $this->start_time, $this->end_time, $this->proposed_at, $this->proposed_by, $this->approved_at, $this->approved_by, $this->status, $this->applicants, $this->facebook_link, $this->twitter_link, $this->id);
				if (!$stmt->execute()) return false;
				return true;
			}
		}

	}

	public function validate() {
		// TODO: Validate fields
		return true;
	}

	// 1 = success 0 = query fail 2 = already booked
	public function bookEvent($student_id){
		Event::db_init();
		$id = $this->id;

		$curr_time = $this->current_time();

		$check_already_booked = Event::$db->query("SELECT `id` FROM `applications` WHERE `student_id` = $student_id AND `event_id` = $id");
		//current user not booked this event yet
		if($check_already_booked->num_rows == 0){
			$result = Event::$db->query("UPDATE `events` SET `applicants` = `applicants` + 1 WHERE `id` = $id");
			$result2 = Event::$db->query("INSERT INTO `applications` (`student_id`, `event_id`, `created_at`) VALUES ($student_id, $id, '$curr_time')");
			if($result && $result2){
				return 1;
			} else {
				return 0;
			}
		} else {
			// user already booked  this event
			return 2;
		}
	}

		// 1 = success 0 = query fail 
	public function unbookEvent($student_id){
		Event::db_init();
		$id = $this->id;
				
			$result = Event::$db->query("UPDATE `events` SET `applicants` = `applicants` - 1 WHERE `id` = $id");
			$result2 = Event::$db->query("DELETE FROM `applications` WHERE `student_id`=$student_id AND `event_id`=$id");
			if($result && $result2){
				return 1;
			} else {
				return 0;
			}
	}
 
	public static function countPendingEvents(){
		Event::db_init();
		$result = Event::$db->query("SELECT COUNT(id) FROM `events` WHERE `status`='pending'");
		$obj = $result->fetch_row();
		return $obj[0];
	}

	public static function isBooked($student_id, $event_id)
	{
		Event::db_init();
		$result = Event::$db->query("SELECT COUNT(id) FROM `applications` WHERE `student_id` = $student_id AND `event_id` = $event_id AND`status`='reserved'");
		$obj = $result->fetch_row();
		return $obj[0];
	}

	public static function getEventById($id) {
		Event::db_init();
		$result = Event::$db->query("SELECT `id`, `type`, `title`, `description`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `twitter_link` FROM `events` WHERE `id` = $id LIMIT 1");
		if ($result->num_rows == 0) {
			throw new Exception('No such event.');
		}
		$event = $result->fetch_object('Event');
		$event->new_record = false;
		return $event;
	}

	public static function getEventList(){
		Event::db_init();
		$result = Event::$db->query("SELECT `id`, `title`, `description`, `type`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `twitter_link` FROM `events` WHERE `status`='approved' ORDER BY `start_time`");

		$events = array();
		while($event = $result->fetch_object('Event')){
			$event->new_record = false;
			$events[] = $event;
		}
		return $events;
	}

	public static function getPendingEventList(){
		Event::db_init();
		$result = Event::$db->query("SELECT `id`, `title`, `description`, `type`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `twitter_link` FROM `events` WHERE `status`='pending' ORDER BY `start_time`");

		$events = array();
		while($event = $result->fetch_object('Event')){
			$event->new_record = false;
			$events[] = $event;
		}
		return $events;
	}

	public static function getBookedEventList($student_id){
		Event::db_init();
		$result = Event::$db->query("SELECT `id`, `title`, `description`, `type`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `twitter_link` FROM `events` WHERE `id` IN (SELECT `event_id` FROM `applications` WHERE `student_id` = $student_id) ORDER BY `start_time`");

		$events = array();
		while($event = $result->fetch_object('Event')){
			$event->new_record = false;
			$events[] = $event;
		}
		return $events;
	}

	public static function getFilteredEventList($options) {
		Event::db_init();
		$query = $options['query'];
		$result = Event::$db->query("SELECT `id`, `title`, `description`, `type`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `facebook_link`, `twitter_link` FROM `events` WHERE `description` LIKE '%$query%'");

		$events = array();
		while($event = $result->fetch_object('Event')){
			$event->new_record = false;
			$events[] = $event;
		}
		return $events;
	}

	public function getRoomName() {
		if ($this->room_id) {
			$rm = Room::getRoomById($this->room_id);
			return $rm->name.' ('.$rm->code.')';
		} else {
			return 'TBD';
		}
	}

	public function getRoomSize() {
			$rm = Room::getRoomById($this->room_id);
			return $rm->size;
	}

	public function getBuildingName() {
		if ($this->room_id) {
			$rm = Room::getRoomById($this->room_id);
			return $rm->getBuildingName();
		} else {
			return 'TBD';
		}
	}
}