<?php

class User extends Model {
	// mapped to database fields
	public $id;
	public $email;
	public $hashed_password;
	public $firstname;
	public $lastname;
	public $gender; // 0 => male, 1 => female
	public $dob;
	public $avatar;
	public $registered_at;

	public function __construct() {
		parent::__construct();
		$this->registered_at = $this->current_time();
	}

	/**
	 * This class method authenticate the user using email and password.
	 * @return	false if authentication fails
	 * 			a user object if email and password matches
	 */
	public static function authenticate($email, $password){
		User::db_init();
		$result = User::$db->query("SELECT id, email, hashed_password, firstname, lastname FROM users WHERE email = '$email' LIMIT 1");
		
		if( $result->num_rows == 0 ) {
			// No matching email address
			return false;
		}
		else {
			// Email matched, check password
			$user = $result->fetch_object('User');

			// TODO: change to hashed password later
			if ($user->hashed_password == $password) {

				$_SESSION['user'] = $user;
				return $user;
				
			} else {

				return false;
			}
		}
	}

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$stmt = User::$db->prepare(
				"INSERT INTO `users` (`email`, `hashed_password`, `firstname`, `lastname`, `gender`, `dob`, `avatar`, `registered_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("ssssisss", $this->email, $this->hashed_password, $this->firstname, $this->lastname, $this->gender, $this->dob, $this->avatar, $this->registered_at);
				if ( !$stmt->execute() ) return false;
				$this->id = $stmt->insert_id;
				return true;
			}
		}
		else {
			// TODO: Update record
			throw new Exception('Update not implemented yet.');
		}

	}

	public function validate() {
		// TODO: Validate fields
		return true;
	}

	/**
	 * This class method returns a user object from a user id.
	 */
	public static function getUserById($id) {
		User::db_init();
		$result = User::$db->query("SELECT `id`, `email`, `hashed_password`, `firstname`, `lastname`, `gender`, `dob`, `avatar`, `registered_at` FROM `users` WHERE id = $id");
		if (!$result) {
			throw new Exception('No such user.');
		}
		$user = $result->fetch_object('User');
		$user->new_record = false;
		return $user;
	}
}
