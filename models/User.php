<?php

class User extends Model {
	public $id;
	public $email;
	public $hashed_password;
	public $firstname;
	public $lastname;
	public $gender;
	public $dob;
	public $avatar;
	public $registered_at;

	public static function authenticate($email, $password){
		User::db_init();
		$result = User::$db->query("SELECT id, email, hashed_password, firstname, lastname FROM users WHERE email = '$email' LIMIT 1");
		if( !$result ) {
			return false;
		}
		else {
			// $result->fetch_object('User');
			// TODO
		}
	}
}
