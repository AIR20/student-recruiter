<?php
class AdminTeadm extends PHPUnit_Framework_TestCase {

	public function testCreateAdmin() {
		$adm = new Admin();
		$adm->firstname = "Just";
		$adm->lastname = "Dominik";
		$adm->hashed_password = "123456";
		$adm->email = "just@example.com";
		$adm->gender = 0;
		$adm->dob = '1999-09-21';
		$adm->phone = '07422 133488';

		$this->assertTrue($adm->save(), "Cannot create admin");
		$this->assertInternalType("int", $adm->id);
		return $adm->id;
	}

	/**
	 * @depends testCreateAdmin
	 */
	public function testFindAdmin($id) {
		$adm = Admin::getAdminById($id);
		$this->assertEquals('07422 133488', $adm->phone);
	}

}
