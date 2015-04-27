<?php

class User extends Model {
	// mapped to database fields
	public $id;
	public $email;
	public $hashed_password;
	public $role; // 0 => Admin, 1 => Staff, 2 => Teacher, 3 => Student
	public $firstname;
	public $lastname;
	public $gender; // 0 => male, 1 => female
	public $dob;
	public $avatar;
	public $registered_at;

	/**
	 * This class method authenticate the user using email and password.
	 * @return	false if authentication fails
	 * 			a user object if email and password matches
	 */
	public static function authenticate($email, $password){
		User::db_init();
		$result = User::$db->query("SELECT id, email, hashed_password FROM users WHERE email = '$email' LIMIT 1");
		
		if( $result->num_rows == 0 ) {
			// No matching email address
			return false;
		}
		else {
			// Email matched, check password
			$user = $result->fetch_object('User');

			// TODO: change to hashed password later
			if ($user->hashed_password == $password) {

				return $user->id;
				
			} else {

				return false;
			}
		}
	}

	public function save() {
		if (!parent::save()) return false;

		if ($this->new_record) {
			$this->registered_at = $this->current_time();
			$stmt = User::$db->prepare(
				"INSERT INTO `users` (`email`, `hashed_password`, `role`, `firstname`, `lastname`, `gender`, `dob`, `avatar`, `registered_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
			);
			if ($stmt) {
				$stmt->bind_param("ssississs", $this->email, $this->hashed_password, $this->role, $this->firstname, $this->lastname, $this->gender, $this->dob, $this->avatar, $this->registered_at);
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
	public static function getUserById($id, $klass = 'User') {
		User::db_init();
		$result = User::$db->query("SELECT `id`, `email`, `hashed_password`, `role`, `firstname`, `lastname`, `gender`, `dob`, `avatar`, `registered_at` FROM `users` WHERE id = $id LIMIT 1");
		if ( $result->num_rows == 0 ) {
			throw new Exception('No such user.');
		}
		$user = $result->fetch_object($klass);
		$user->new_record = false;
		return $user;
	}

	/**
	 *	These functions test the role of the user.
	 */
	public function isAdmin() {
		return $this->role == 0;
	}
	public function isStaff() {
		return $this->role == 1;
	}
	public function isTeacher() {
		return $this->role == 2;
	}
	public function isStudent() {
		return $this->role == 3;
	}
}
