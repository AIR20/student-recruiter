<?php

class Admin extends User {
	// mapped to database fields
	public $phone;


	public function save() {
		// Admin::$db->begin_transaction();

		$this->role = 0; // role is admin

		if (!parent::save()) {
			// Admin::$db->rollback();
			return false;
		}

		if ($this->new_record) {
			$stmt = Admin::$db->prepare(
				"INSERT INTO `admins` (`user_id`, `phone`) VALUES (?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("is", $this->id, $this->phone);
				if ($stmt->execute()) {
					// Admin::$db->commit();
					return true;
				} else {
					// Admin::$db->rollback();
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
