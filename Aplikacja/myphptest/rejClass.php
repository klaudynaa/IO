<?php

class logowanie{
						public $login2;
						public $haslo;
						public $imiee;
						public $nazwiskoo;
						
						
						public function uzupelnijDane($post1, $post2, $post3, $post4)
						{
						$this->login2=$post1;
						$this->haslo=$post2;
						$this->imiee=$post3;
						$this->nazwiskoo=$post4;
						}
						
						public function doSesji()
						{
						$_SESSION['uzytkownicy'] .= "";
						$_SESSION['login2'] .= $this->login2;
						$_SESSION['haslo'] .= $this->haslo;
						$_SESSION['imiee'] .= $this->imiee;
						$_SESSION['nazwiskoo'] .= $this->nazwiskoo;
						}
						
						public function wyswietl()
						{
						echo "<b>Login: </b>".$this->login2;
						echo "<br />";
						echo "<b>Haslo: </b>".$this->haslo;
						echo "<br />";
						echo "<b>Imie: </b>".$this->imiee;
						echo "<br />";
						echo "<b>Nazwisko: </b>".$this->nazwiskoo;
						echo "<br />";	
						}
						
				}
				
?>