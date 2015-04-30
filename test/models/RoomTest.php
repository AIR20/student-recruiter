<?php
class RoomTest extends PHPUnit_Framework_TestCase {

	public function testCreateRoom() {
		$rm = new Room();
		$rm->name = 'Common Room';
		$rm->code = 'LAB331';
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
		$this->assertEquals('Common Room', $rm->name);
		$this->assertEquals('LAB331', $rm->code);
	}

	public function testListRoom() {
		$rms = Room::getRoomList();
		$this->assertInternalType("array", $rms);
	}

}
