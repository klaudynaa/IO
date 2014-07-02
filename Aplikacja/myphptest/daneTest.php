<?php

require_once 'daneClass.php';

class TestDanych extends PHPUnit_Framework_TestCase {
	
	public function testArgument(){
		$this->assertClassHasAttribute('login2', 'daneUzytkownika');
		}
		
	public function testNullArgument(){
		$temp = new daneUzytkownika;
		$login = $temp->uzupelnij();
		$this->assertNull($login);
		}
		
	
		
}