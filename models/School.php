<?php

class School extends Model {
	// mapped to database fields
	public $id;
	public $name;
	public $school_type;
	public $address_line1;
	public $address_line2;
	public $address_line3;
	public $postcode;
	public $tel;

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$stmt = School::$db->prepare(
				"INSERT INTO `schools` (`name`, `school_type`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel`) VALUES (?, ?, ?, ?, ?, ?, ?)"
			);

			if ($stmt) {
				$stmt->bind_param('sssssss', $this->name, $this->school_type, $this->address_line1, $this->address_line2, $this->address_line3, $this->postcode, $this->tel);

				if (!$stmt->execute()) return false;

				$this->id = $stmt->insert_id;
				return true;
			}
		} else {
			// TODO: update record
		}
	}

	public function validate() {
		// TODO: validate record
		return true;
	}

	public static function getSchoolById($id) {
		$result = School::$db->query(
			"SELECT `id`, `name`, `school_type`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel` FROM `schools` WHERE id = $id LIMIT 1"
		);

		$school = $result->fetch_object('School');
		if ($school) {
			$school->new_record = false;
			return $school;
		} else {
			throw new Exception("No such school.");
		}
	}

	public static function getSchoolList() {
		School::db_init();
		$result = School::$db->query(
			"SELECT `id`, `name`, `school_type`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel` FROM `schools`"
		);

		$schools = array();
		while ($school = $result->fetch_object('School')) {
			$school->new_record = false;
			$schools[] = $school;
		}
		return $schools;
	}
}
