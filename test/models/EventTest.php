<?php
class EventTest extends PHPUnit_Framework_TestCase {

	public function testCreateEvent() {
		$ev = new Event();
		$ev->title = 'Test Title';
		$ev->description = 'Event just used in test.';
		$ev->tags = 'test';
		$ev->room_id = 1;
		$ev->start_time = '2015-04-20 15:00';
		$ev->end_time = '2015-04-20 18:00';
		$ev->facebook_link = 'http://facebook.com/test';

		$this->assertTrue($ev->save(), "Cannot create event");
		$this->assertInternalType("int", $ev->id);
		return $ev->id;
	}

	/**
	 * @depends testCreateEvent
	 */
	public function testFindEvent($id) {
		$ev = Event::getEventById($id);
		$this->assertEquals('Test Title', $ev->title);
		$this->assertEquals('http://facebook.com/test', $ev->facebook_link);
		$this->assertEquals(0, $ev->applicants);
		$this->assertEquals('Teaching Laboratory 2 GHOLT-H102', $ev->getRoomName());
		$this->assertEquals('George Holt building', $ev->getBuildingName());
	}

	public function testListEvents() {
		$evs = Event::getEventList();
		$this->assertInternalType("array", $evs);
	}

}
