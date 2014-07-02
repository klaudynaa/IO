<?php

require_once 'baza2Class.php';

class TestPozostale extends PHPUnit_Framework_TestCase {
	
	public function testArgument(){
		$this->assertClassHasAttribute('cokolwiek', 'pozostale');
	}
	
	public function testNullArgument(){
		$temp = new pozostale;
		$pom = $temp->wyswietlNaglowki();
		$this->assertNull($pom);
	}
	
	public function testInstanceOf(){
		$obj = new pozostale;
		$this->assertInstanceOf('pozostale', $obj);

	}
	
	
}


?>