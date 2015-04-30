<?php

class Department extends Model {
	public $id;
	public $name;
	public $building_id;
	public $address_line1;
	public $address_line2;
	public $address_line3;
	public $postcode;
	public $tel;
	
	public function save() {
		if (!parent::save()) return false;

		if($this->new_record) {
			$stmt = Department::$db->prepare(
				"INSERT INTO `departments` (`name`, `building_id`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel`) VALUES (?, ?, ?, ?, ?, ?, ?)"
			);

			if ($stmt) {
				$stmt->bind_param('sisssss', $this->name, $this->building_id, $this->address_line1, $this->address_line2, $this->address_line3, $this->postcode, $this->tel);

				if(!$stmt->execute()) return false;

				$this->id = $stmt->insert_id;
				return true;
			}
		} else {
			// TODO: update record
		}
	}

	public static function getDepartmentById($id){
		Department::db_init();
		$result = Department::$db->query(
			"SELECT `id`, `name`, `building_id`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel` FROM `departments` WHERE id = $id LIMIT 1"
		);

		$department = $result->fetch_object('Department');
		if($department) {
			$department->new_record = false;
			return $department;
		} else {
			throw new Exception( "No such department.");
		}
	}

	public static function getDepartmentList(){
		Department::db_init();
		$result = Department::$db->query(
			"SELECT `id`, `name`, `building_id`, `address_line1`, `address_line2`, `address_line3`, `postcode`, `tel` FROM `departments`"
		);
		
		$departments = array();
		while($department = $result->fetch_object('Department')) {
			$department->new_record = false;
			$departments[] = $department;
		}
		return $departments;
	}
}

			
