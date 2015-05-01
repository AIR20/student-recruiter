<?php

class Room extends Model {
	// mapped to database fields
	public $id;
	public $name;
	public $code;
	public $building_id;
	public $size = 0;

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$stmt = Room::$db->prepare(
				"INSERT INTO `rooms` (`name`, `code`, `building_id`, `size`) VALUES (?, ?, ?, ?)"
			);

			if ($stmt) {
				$stmt->bind_param('ssii', $this->name, $this->code, $this->building_id, $this->size);

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

	public static function getRoomById($id) {
		$result = Room::$db->query(
			"SELECT `id`, `name`, `code`, `building_id`, `size` FROM `rooms` WHERE id = $id LIMIT 1"
		);

		$room = $result->fetch_object('Room');
		if ($room) {
			$room->new_record = false;
			return $room;
		} else {
			throw new Exception("No such room.");
		}
	}

	public static function getRoomList() {
		Room::db_init();
		$result = Room::$db->query(
			"SELECT rooms.id, rooms.name, code, building_id, size FROM rooms INNER JOIN buildings ON building_id=buildings.id ORDER BY buildings.name;"
		);

		$rooms = array();
		while ($room = $result->fetch_object('Room')) {
			$room->new_record = false;
			$rooms[] = $room;
		}
		return $rooms;
	}

	public function getBuildingName() {
		if ($this->building_id) {
			$bd = Building::getBuildingById($this->building_id);
			return $bd->name;
		} else {
			return 'TBD';
		}
	}
}
