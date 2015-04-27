<?php
class StudentTest extends PHPUnit_Framework_TestCase {

	public function testCreateStudent() {
		$st = new Student();
		$st->firstname = "Alan";
		$st->lastname = "Turing";
		$st->hashed_password = "123456";
		$st->email = "alan@example.com";
		$st->gender = 0;
		$st->dob = '1999-09-21';
		$st->address_line1 = 'Ashton St';
		$st->address_line2 = 'Liverpool';

		$this->assertTrue($st->save(), "Cannot create student");
		$this->assertInternalType("int", $st->id);
		return $st->id;
	}

	/**
	 * @depends testCreateStudent
	 */
	public function testFindStudent($id) {
		$st = Student::getStudentById($id);
		$this->assertEquals('Ashton St', $st->address_line1);
		$this->assertEquals('Liverpool', $st->address_line2);
	}

}
