<?php

class Student extends User {
	// mapped to database fields
	public $school_id;
	public $teacher_id;
	public $address_line1;
	public $address_line2;
	public $address_line3;
	public $postcode;


	public function save() {
		// Student::$db->begin_transaction();


		if ($this->new_record) {

			$this->role = 3; // Role is student

			// Save the parent
			if (!parent::save()) {
				// Student::$db->rollback();
				return false;
			}

			$stmt = Student::$db->prepare(
				"INSERT INTO `students` (`user_id`, `school_id`, `teacher_id`, `address_line1`, `address_line2`, `address_line3`, `postcode`) VALUES (?, ?, ?, ?, ?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("iiissss", $this->id, $this->school_id, $this->teacher_id, $this->address_line1, $this->address_line2, $this->address_line3, $this->postcode);
				if ($stmt->execute()) {
					// Student::$db->commit();
					return true;
				} else {
					// Student::$db->rollback();
					return false;
				}
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
