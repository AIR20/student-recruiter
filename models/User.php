<?php

class User extends Model {
	public $id;
	public $email;
	public $hashed_password;
	public $firstname;
	public $lastname;
	public $gender;
	public $dob;
	public $avator;
	public $registered_at;

	public static function authenticate($email, $password){
		User::db_init();
		$result = User::$db->query("SELECT id, email, hashed_password, firstname, lastname FROM users WHERE email = '$email' LIMIT 1");
		if( !$result ) {
			// No matching email address
			return false;
		}
		else {
			// Email matched, check password
			$user = $result->fetch_object('User');

			// TODO: change to hashed password later
			if ($user->hashed_password == $password) {
				return $user;
			}
		}
	}
}