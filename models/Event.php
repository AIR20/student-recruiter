<?php

class Event extends Model {
	// mapped to database fields
	public $id;
	public $title;
	public $description;
	public $tags;
	public $room_id;
	public $start_time;
	public $end_time;
	public $proposed_at;
	public $proposed_by;
	public $approved_at;
	public $approved_by;
	public $status = "pending";
	public $applicants = 0;
	public $facebook_link;
	public $twitter_link;

	public function __construct() {
		parent::__construct();
		$this->proposed_at = $this->current_time();
	}

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$stmt = Event::$db->prepare(
				"INSERT INTO `events` (`title`, `description`, `tags`, `room_id`, `start_time`, `end_time`, `proposed_at`, `proposed_by`, `approved_at`, `approved_by`, `status`, `applicants`, `facebook_link`, `twitter_link`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("sssisssisississ", $this->title, $this->description, $this->tags, $this->room_id, $this->start_time, $this->end_time, $this->proposed_at, $this->proposed_by, $this->approved_at, $this->approved_by, $this->status, $this->applicants, $this->facebook_link, $this->twitter_link);
				if ( !$stmt->execute() ) return false;
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
}
