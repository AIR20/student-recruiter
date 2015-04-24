<?php

class Room extends Model {
	// mapped to database fields
	public $id;
	public $room_name;
	public $room_no;
	public $building_id;
	public $size = 0;

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$stmt = Room::$db->prepare(
				"INSERT INTO `rooms` (`room_name`, `room_no`, `building_id`, `size`) VALUES (?, ?, ?, ?)"
			);

			if ($stmt) {
				$stmt->bind_param('ssii', $this->room_name, $this->room_no, $this->building_id, $this->size);

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
			"SELECT `id`, `room_name`, `room_no`, `building_id`, `size` FROM `rooms` WHERE id = $id LIMIT 1"
		);

		$room = $result->fetch_object('Room');
		if ($room) {
			$room->new_record = false;
			return $room;
		} else {
			throw new Exception("No such room.");
		}
	}

	public static function getAllRooms() {
		$result = Room::$db->query(
			"SELECT `id`, `room_name`, `room_no`, `building_id`, `size` FROM `rooms`"
		);

		$rooms = array();
		while ($room = $result->fetch_object('Room')) {
			$room->new_record = false;
			$rooms[] = $room;
		}
		return $rooms;
	}
}
