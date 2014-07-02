<?php

class daneUzytkownika{
	public $login4;
	public $login2;
	public $imie1;
	public $nazwisko1;
	public $haslo1;
	
	public function uzupelnij()
	{
	$this->login4 = $_GET["login4"];
	$this->login2 = $_POST["login2"];
	$this->imie1 = $_POST["imiee"];
	$this->nazwisko1 = $_POST["nazwiskoo"];
	$this->haslo1 = $_POST["haslo"];
	}
	
	public function postuj($lancuch, $post)
	{
			echo "<br>";
		    echo ("$lancuch: ");
            echo ($_POST[$post]);
	}
}

?>