<?php

require_once 'formClassWysylanie.php';

class TestFormularza extends PHPUnit_Framework_TestCase{

	public function testArgument() {
	$this->assertClassHasAttribute('cokolwiek', 'wysylanie');
	}
	
	public function testNullArgument() {
		$temp = new wysylanie;
		$temp->wyswietlPosta("arg1", "arg2");
		}
		
	public function testEquals(){
		$temp1 = new wysylanie;
		$temp1->wyswietlPosta('arg1', 'arg2');
		}

	public function testInstanceOf(){
		$obj = new TestFormularza;
		$this->assertInstanceOf('wysylanie', $obj);
	}
}

?>