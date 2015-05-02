<?php

class Staff extends User {
	// mapped to database fields
	public $department_id;
	public $phone;


	public function save() {
		// Staff::$db->begin_transaction();

		$this->role = 1; // role is staff

		if (!parent::save()) {
			// Staff::$db->rollback();
			return false;
		}

		if ($this->new_record) {
			$stmt = Staff::$db->prepare(
				"INSERT INTO `staff` (`user_id`, `department_id`, `phone`) VALUES (?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("iis", $this->id, $this->department_id, $this->phone);
				if ($stmt->execute()) {
					// Staff::$db->commit();
					return true;
				} else {
					// Staff::$db->rollback();
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
	
	public static function getStaffList(){
		Staff::db_init();
		$result = Staff::$db->query("SELECT `user_id` FROM `staff`");

		$staffs = array();
		while ($tmp = $result->fetch_object()){
			$staffs[] = Staff::getStaffById($tmp->user_id);
		}
		return $staffs;
	}

	public static function getStaffById($id) {
		$staff = User::getUserById($id, 'Staff');
		$result = Staff::$db->query(
			"SELECT `user_id`, `department_id`, `phone` FROM `staff` WHERE `user_id` = $id LIMIT 1"
		);

		$tmp = $result->fetch_object();
		if ($tmp) {
			$staff->department_id = $tmp->department_id;
			$staff->phone = $tmp->phone;
			return $staff;
		} else {
			throw new Exception("No such staff.");
		}
	}

	public function getDepartment() {
		if($this->department_id) {
			$department = Department::getDepartmentById($this->department_id);
			return $department->name;
		} else {
			return "N/A";
		}
	}

	public function getEventList() {
		return Event::getBookedEventList($this->id);
	}
		
}
