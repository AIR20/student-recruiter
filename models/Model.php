<?php

class Model {
	protected static $db;

	public function __construct(){
		if( null === Model::$db )
			Model::$db = Database::getInstance();
	}

	protected static function db_init(){
		if( null === Model::$db )
			Model::$db = Database::getInstance();
	}
}

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
	}
}