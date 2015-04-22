<?php

class Staff extends User {
	// mapped to database fields
	public $department_id;
	public $phone;


	public function save() {
		Staff::$db->begin_transaction();
		if (!parent::save()) {
			Staff::$db->rollback();
			return false;
		}

		if ($this->new_record) {
			$stmt = Staff::$db->prepare(
				"INSERT INTO `staff` (`user_id`, `department_id`, `phone`) VALUES (?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("iis", $this->id, $this->department_id, $this->phone);
				if ($stmt->execute()) {
					Staff::$db->commit();
					return true;
				} else {
					Staff::$db->rollback();
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
