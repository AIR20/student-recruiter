<?php
class SchoolTest extends PHPUnit_Framework_TestCase {

	public function testCreateSchool() {
		$school = new School();
		$school->name = 'Super High School';
		$school->school_type = 'primary school';
		$school->address_line1 = '211 High Street';
		$school->address_line2 = '';
		$school->address_line3 = 'Liverpool';
		$school->postcode = 'L77 K33';
		$school->tel = '04433 166662';

		$this->assertTrue($school->save(), "Cannot create school");
		$this->assertInternalType("int", $school->id);
		return $school->id;
	}

	/**
	 * @depends testCreateSchool
	 */
	public function testFindSchool($id) {
		$school = School::getSchoolById($id);
		$this->assertEquals('Super High School', $school->name);
		$this->assertEquals('L77 K33', $school->postcode);
	}

	public function testListSchool() {
		$scls = School::getAllSchools();
		$this->assertInternalType("array", $scls);
	}

}
