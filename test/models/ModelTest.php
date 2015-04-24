<?php
class ModelTest extends PHPUnit_Framework_TestCase {

	public function testDatabaseConnection() {
		$m = new Model();
	}

	public function testValidate() {
		$m = new Model();
		$this->assertEquals($m->validate(), true);
	}

	public function testSave() {
		$m = new Model();
		$this->assertEquals($m->save(), true);
	}
}