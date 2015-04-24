<?php
class BuildingTest extends PHPUnit_Framework_TestCase {

	public function testCreateBuilding() {
		$bd = new Building();
		$bd->name = 'Chadwick Tower';
		$bd->map_no = '311';

		$this->assertTrue($bd->save(), "Cannot create building");
		$this->assertInternalType("int", $bd->id);
		return $bd->id;
	}

	/**
	 * @depends testCreateBuilding
	 */
	public function testFindBuilding($id) {
		$bd = Building::getBuildingById($id);
		$this->assertEquals('Chadwick Tower', $bd->name);
		$this->assertEquals('311', $bd->map_no);
	}

	public function testListBuilding() {
		$rms = Building::getAllBuildings();
		$this->assertInternalType("array", $rms);
	}

}
