<?php
class TeacherTest extends PHPUnit_Framework_TestCase {

	public function testCreateTeacher() {
		$t = new Teacher();
		$t->firstname = "Wikc";
		$t->lastname = "Dominik";
		$t->hashed_password = "123456";
		$t->email = "scodfk@example.com";
		$t->gender = 0;
		$t->dob = '1999-09-21';
		$t->school_id = 1;
		$t->phone = '07422 133456';

		$this->assertTrue($t->save(), "Cannot create teacher");
		$this->assertInternalType("int", $t->id);
		return $t->id;
	}

	/**
	 * @depends testCreateTeacher
	 */
	public function testFindTeacher($id) {
		$t = Teacher::getTeacherById($id);
		$this->assertEquals(1, $t->school_id);
		$this->assertEquals('07422 133456', $t->phone);
	}

}
