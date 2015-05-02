<?php

class Teacher extends User {
	// mapped to database fields
	public $school_id;
	public $phone;


	public function save() {
		// Teacher::$db->begin_transaction();
		$this->role = 2;
		
		if (!parent::save()) {
			// Teacher::$db->rollback();
			return false;
		}

		if ($this->new_record) {
			$stmt = Teacher::$db->prepare(
				"INSERT INTO `teachers` (`user_id`, `school_id`, `phone`) VALUES (?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("iis", $this->id, $this->school_id, $this->phone);
				if ($stmt->execute()) {
					// Teacher::$db->commit();
					return true;
				} else {
					// Teacher::$db->rollback();
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
	
	public static function getTeacherList(){
		Teacher::db_init();
		$result = Teacher::$db->query("SELECT `user_id` FROM `teachers`");

		$teachers = array();
		while ($tmp = $result->fetch_object()){
			$teachers[] = Teacher::getTeacherById($tmp->user_id);
		}
		return $teachers;
	}

	public static function getTeacherById($id) {
		$teacher = User::getUserById($id, 'Teacher');
		$result = Teacher::$db->query(
			"SELECT `user_id`, `school_id`, `phone` FROM `teachers` WHERE `user_id` = $id LIMIT 1"
		);

		$tmp = $result->fetch_object();
		if ($tmp) {
			$teacher->school_id = $tmp->school_id;
			$teacher->phone = $tmp->phone;
			return $teacher;
		} else {
			throw new Exception("No such teacher.");
		}
	}

	public function getStudentList() {
		return Student::getStudentListByTeacherId($this->id);
	}

	public static function countStudentsById($id){
		Student::db_init();
		$result = Student::$db->query("SELECT COUNT(`user_id`) FROM `students` WHERE `teacher_id`=$id");
		$obj = $result->fetch_row();
		return $obj[0];	
	}

	public function getEventList() {
		return Event::getBookedEventList($this->id);
	}
}
