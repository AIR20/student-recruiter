<?php
class UserTest extends PHPUnit_Framework_TestCase {

	public function testCreateUser() {
		$user = new User();
		$user->firstname = "John";
		$user->lastname = "Turing";
		$user->hashed_password = "123456";
		$user->email = "john@example.com";
		$user->gender = 0;
		$user->dob = '1999-09-21';
		$user->role = 3; // is student

		$this->assertTrue($user->save(), "Cannot create user");
		$this->assertInternalType("int", $user->id);
		return $user->id;

	}

	/**
	 * @depends testCreateUser
	 */
	public function testFindUser($id) {
		$user = User::getUserById($id);
		$this->assertEquals('John', $user->firstname);
		$this->assertEquals('Turing', $user->lastname);
	}
}
