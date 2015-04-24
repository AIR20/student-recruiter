<?php
class RoomTest extends PHPUnit_Framework_TestCase {

	public function testCreateRoom() {
		$rm = new Room();
		$rm->room_name = 'Common Room';
		$rm->room_no = 'LAB331';
		$rm->size = 21;

		$this->assertTrue($rm->save(), "Cannot create room");
		$this->assertInternalType("int", $rm->id);
		return $rm->id;
	}

	/**
	 * @depends testCreateRoom
	 */
	public function testFindRoom($id) {
		$rm = Room::getRoomById($id);
		$this->assertEquals('Common Room', $rm->room_name);
		$this->assertEquals('LAB331', $rm->room_no);
	}

	public function testListRoom() {
		$rms = Room::getAllRooms();
		$this->assertInternalType("array", $rms);
	}

}
