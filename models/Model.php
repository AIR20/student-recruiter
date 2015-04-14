<?php

class Model {
	// database connection
	protected static $db;

	// new object or existing object in the database
	protected $new_record = true;

	public function __construct(){
		// get database connection
		if( null === Model::$db )
			Model::$db = Database::getInstance();
	}

	// used in static methods
	protected static function db_init(){
		if( null === Model::$db )
			Model::$db = Database::getInstance();
	}

	// save the new record or updated record into the database
	// should be overridden in subclass
	public function save(){
		// validate the record
		return $this->validate();
	}

	// validate the record, return true if the record is valid.
	// should be overriden in subclass
	public function validate(){
		return true;
	}

	protected function current_time(){
		return date('Y-m-d H:i:s');
	}
}


// A singleton class for MySQL database connection
class Database {
	public $connection;
	public static function getInstance(){
		static $inst = null;
		if( null === $inst) {
			$inst = new Database();
		}
		return $inst->connection;
	}

	protected function __construct(){
		global $config;
		$this->connection = new mysqli($config['db']['hostname'], $config['db']['username'], $config['db']['password'], $config['db']['database']);
		if($this->connect_error)
			throw new Exception('Database connection failed.');
	}
}