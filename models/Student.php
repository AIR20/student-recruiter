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

		$this->role = 3; // Role is student

		// Save the parent
		if (!parent::save()) {
			// Student::$db->rollback();
			return false;
		}

		if ($this->new_record) {

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

	public function getEventList() {
		return Event::getBookedEventList($this->id);
	}

	public static function getStudentById($id) {
		$student = User::getUserById($id, 'Student');
		$result = Student::$db->query(
			"SELECT `user_id`, `school_id`, `teacher_id`, `address_line1`, `address_line2`, `address_line3`, `postcode` FROM `students` WHERE `user_id` = $id LIMIT 1"
		);

		$tmp = $result->fetch_object();
		if ($tmp) {
			$student->school_id = $tmp->school_id;
			$student->teacher_id = $tmp->teacher_id;
			$student->address_line1 = $tmp->address_line1;
			$student->address_line2 = $tmp->address_line2;
			$student->address_line3 = $tmp->address_line3;
			$student->postcode = $tmp->postcode;
			return $student;
		} else {
			throw new Exception("No such student.");
		}
	}


	public static function getStudentList(){
		Student::db_init();
		$result = Student::$db->query("SELECT `user_id`, `school_id`, `teacher_id`, `address_line1`, `address_line2`, `address_line3`, `postcode` FROM students");
		
		$students = array();
		while($student = $result->fetch_object('Student')){
			$students[] = $student;
		}
		return $students;
	}

	public static function getStudentListByTeacherId($id) {
		Student::db_init();
		$result = Student::$db->query(
			"SELECT `user_id`, `school_id`, `teacher_id`, `address_line1`, `address_line2`, `address_line3`, `postcode` FROM `students` WHERE `teacher_id` = $id"
		);

		$students = array();
		while ($tmp = $result->fetch_object()) {
			$students[] = Student::getStudentById($tmp->user_id);
		}
		return $students;
	}
}
