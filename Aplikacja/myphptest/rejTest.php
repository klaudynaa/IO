<?php

require_once 'rejClass.php';

class TestRejestracja extends PHPUnit_Framework_TestCase {

	public function testArgument(){
		$this->assertClassHasAttribute('nazwa', 'logowanie');
	}
		
	public function testNullArgument(){
		$temp = new logowanie;
		$pom = $temp->uzupelnijDane('post1', 'post2', 'post3', 'post4');
		$this->assertNull($pom);
		}
	
	public function testInstanceOf(){
		$obj = new logowanie;
		$this->assertInstanceOf('logowanie', $obj);
		}
	
}


?>