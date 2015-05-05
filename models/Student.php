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


	public static function getStudentsFromSchool($schoolID){
		Student::db_init();

		$result = Student::$db->query("SELECT `user_id` FROM `students` WHERE `school_id` = $schoolID AND  `teacher_id` IS NULL");

		$students = array();
		while($tmp = $result->fetch_object()){
			$students[] = Student::getStudentById($tmp->user_id);
		}
		return $students;
	}

	public static function getStudentList(){
		Student::db_init();
		$result = Student::$db->query("SELECT `user_id` FROM `students`");

		$students = array();
		while($tmp = $result->fetch_object()){
			$students[] = Student::getStudentById($tmp->user_id);
		}
		return $students;
	}

	public static function getStudentListByTeacherId($id) {
		Student::db_init();
		$result = Student::$db->query(
			"SELECT `user_id` FROM `students` WHERE `teacher_id` = $id"
		);

		$students = array();
		while ($tmp = $result->fetch_object()) {
			$students[] = Student::getStudentById($tmp->user_id);
		}
		return $students;
	}

	public static function getStudentListByEventId($id) {
		Student::db_init();
		$result = Student::$db->query(
			"SELECT `student_id` FROM `applications` WHERE `event_id` = $id ORDER BY `created_at`"
		);

		$students = array();
		while ($tmp = $result->fetch_object()) {
			$students[] = Student::getStudentById($tmp->user_id);
		}
		return $students;
	}

	public function updateTeacher($teacherID){

		$result = Student::$db->query(
			"UPDATE `students` SET `teacher_id` = $teacherID WHERE `user_id` = " . $this->id
		);

	}

	public function getTeacherName(){
		if($this->teacher_id){
			$teacher = Teacher::getTeacherById($this->teacher_id);
			return $teacher->firstname . ' ' . $teacher->lastname;
		} else {
			return "N/A";
		}
	}


	public function getSchool($studentID){
		if($this->school_id){
			$school = School::getSchoolByID($this->school_id);
			return $school->id;

		} else {
			return 0;
		}

	}

}
