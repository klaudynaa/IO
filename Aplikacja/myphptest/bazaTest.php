<?php

require_once 'bazaClass.php';

class TestBaza extends PHPUnit_Framework_TestCase {
	public function testArgument(){
		$this->assertClassHasAttribute('nazwa', 'bazaInfoDane');
		}
		
	public function testNullArgument(){
		$temp = new bazaInfoDane;
		$pom = $temp->wyswietlZawartosc();
		$this->assertNull($pom);
		}
		
	public function testInstanceOf(){
		$obj = new bazaInfoDane;
		$this->assertInstanceOf('bazaInfoDane', $obj);
		}
		
	public function testTrue(){
		$obj = new bazaInfoDane;
		$obj->wyswietlZawartosc();
		$cos = $obj->wyswietlZawartosc();
		$this->assertFalse($cos); //
		}
		
		
}

?>