<?php
class StaffTest extends PHPUnit_Framework_TestCase {

	public function testCreateStaff() {
		$st = new Staff();
		$st->firstname = "Alan";
		$st->lastname = "Dominik";
		$st->hashed_password = "123456";
		$st->email = "dominik@example.com";
		$st->gender = 0;
		$st->dob = '1999-09-21';
		$st->department_id = 1;
		$st->phone = '07422 133456';

		$this->assertTrue($st->save(), "Cannot create staff");
		$this->assertInternalType("int", $st->id);
		return $st->id;
	}

	/**
	 * @depends testCreateStaff
	 */
	public function testFindStaff($id) {
		$st = Staff::getStaffById($id);
		$this->assertEquals(1, $st->department_id);
		$this->assertEquals('07422 133456', $st->phone);
	}

}
