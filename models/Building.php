<?php

class Building extends Model {
	// mapped to database fields
	public $id;
	public $name;
	public $map_no;

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$stmt = Building::$db->prepare(
				"INSERT INTO `buildings` (`name`, `map_no`) VALUES (?, ?)"
			);

			if ($stmt) {
				$stmt->bind_param('si', $this->name, $this->map_no);

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

	public static function getBuildingById($id) {
		$result = Building::$db->query(
			"SELECT `id`, `name`, `map_no` FROM `buildings` WHERE id = $id LIMIT 1"
		);

		$building = $result->fetch_object('Building');
		if ($building) {
			$building->new_record = false;
			return $building;
		} else {
			throw new Exception("No such building.");
		}
	}

	public static function getBuildingList() {
		$result = Building::$db->query(
			"SELECT `id`, `name`, `map_no` FROM `buildings`"
		);

		$buildings = array();
		while ($building = $result->fetch_object('Building')) {
			$building->new_record = false;
			$buildings[] = $building;
		}
		return $buildings;
	}
}
