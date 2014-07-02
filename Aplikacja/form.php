<meta content="text/php; charset=utf-8" http-equiv="Content-Type" />
<?php 

$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo');
$db = mysql_select_db('klaudynna_cba_pl'); 

if (!$bd) {
	  exit('<p>Nie można skontaktować się ' .
	      'w tej chwili z baza danych.</p>');
	}
if (!mysql_select_db('klaudynna_cba_pl')) {
	  exit('<p>Nie można zlokalizować ' .
	      'w tej chwili bazy danych.</p>');
	}

	class wysylanie{
				public $idpracownika;// = null;
				public $imiee; //= null;
				public $nazwisko; //= null;
				public $naz_pan; //= null;
				public $email; //= null;
				public $kod_p; // = null;
				public $plec; //= null;
				
				public function _construct( $imiee2, $nazwisko2, $naz_pan2, $email2, $kod_p2, $plec2 ){ //2
        $this->imiee = $imiee2;
        $this->nazwisko = $nazwisko2; 
		$this->naz_pan = $naz_pan2;
        $this->email = $email2; 	
		$this->kod_p = $kod_p2;
        $this->plec = $plec2; 	
				}
				
				public function nadajPonownie( $imiee2, $nazwisko2, $naz_pan2, $email2, $kod_p2, $plec2 ){ //2
        $this->imiee = $imiee2;
        $this->nazwisko = $nazwisko2; 
		$this->naz_pan = $naz_pan2;
        $this->email = $email2; 	
		$this->kod_p = $kod_p2;
        $this->plec = $plec2; 	
				}
				
				public function wyswietlPosta($wyswietlane, $postowane){
				 echo('<br/>');
                echo ("$wyswietlane: ");
                echo ($_POST[$postowane]);
				}
}

	class operacje{

		public $temp;
		
		public function doBazy($imie, $nazwisko, $plec, $naz_pan, $email, $kod_p, $id)
			{
							$temp="INSERT INTO Pracownicy VALUES('$imie', '$nazwisko', '$plec', '$naz_pan', '$email', '$kod_p', '$id')";
							return $temp;
		
			}
		
}


if(isset($_POST["wyslij"]))
{
				
				$osoba = new wysylanie($_POST['imie'], $_POST['nazwisko'], $_POST['naz_pan'], $_POST['email'], $_POST['kod_p'], $_POST['plec']);
				$operacjePHP = new operacje();
				
				/*$osoba->imiee = $_POST['imie'];
				$osoba->nazwisko = $_POST["nazwisko"];
				$osoba->naz_pan = $_POST["naz_pan"];
				$osoba->email = $_POST["email"];
				$osoba->kod_p = $_POST["kod_p"];
				$osoba->plec = $_POST["plec"];*/
				
				

	
	if(!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["naz_pan"]) && !empty($_POST["kod_p"]) && !empty($_POST["email"]))
	{ 
      
      if(preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $_POST["email"]) && preg_match('/^[0-9]{2}+\-[0-9]{3}$/D', $_POST["kod_p"]))
      {
						
		  echo "<br>";
		        echo ("id: ");
                echo ($_GET["id"]);
				
				//$operacyjka->postuj("Imie", "imie");
               $osoba->wyswietlPosta("Nazwa", "imie");
			   $osoba->wyswietlPosta("Rezyser", "nazwisko");
			   $osoba->wyswietlPosta("Produkcja", "naz_pan");
			   $osoba->wyswietlPosta("Dostepnosc", "plec");
			   $osoba->wyswietlPosta("Dystrybutor(mail)", "email");
			   $osoba->wyswietlPosta("Kod produktu", "kod_p");
			   
			  // echo('<br/>');
               // echo ("Imie: ");
                //echo ($_POST['imie']);
				
               /* echo('<br/>');
                echo ("Nazwisko: ");
                echo ($_POST['nazwisko']);
                
                echo('<br/>');
                echo ("Produkcja: ");
                echo ($_POST["naz_pan"]);
                
                echo('<br/>');
                echo ("Dostępność: ");
                echo ($_POST["plec"]);
                
                echo('<br/>');
                echo ("E-mail: ");
                echo ($_POST["email"]);
                
                echo('<br/>');
                echo ("Kod produktu: ");
                echo ($_POST["kod_p"]);*/
                
                echo("<br/>");
                echo("<br/>");
				
				$osoba->idpracownika = $_GET["id"];
				$osoba->nadajPonownie($_POST['imie'], $_POST['nazwisko'], $_POST['naz_pan'], $_POST['email'], $_POST['kod_p'], $_POST['plec']);
				/*$osoba->imiee = $_POST['imie'];
				$osoba->nazwisko = $_POST['nazwisko'];
				$osoba->naz_pan = $_POST["naz_pan"];
				$osoba->email = $_POST["email"];
				$osoba->kod_p = $_POST["kod_p"];
				$osoba->plec = $_POST["plec"];*/
				
				$_SESSION['dodani'] += 1;
				$_SESSION['Pracownicy'] .= "<br> Nazwa: $osoba->imiee <br> Rezyser: $osoba->nazwisko <br> Produkcja: $osoba->naz_pan <br> Dostepnosc: $osoba->plec <br> Dystrybutor(mail): $osoba->email <br> Kod produktu: $osoba->kod_p <br>";
				
				$sql = $operacjePHP->doBazy($osoba->imiee, $osoba->nazwisko, $osoba->plec, $osoba->naz_pan, $osoba->email, $osoba->kod_p, $osoba->id);
				
				/*"INSERT INTO Pracownicy
								VALUES('$osoba->imiee', '$osoba->nazwisko', '$osoba->plec', '$osoba->naz_pan', '$osoba->email', '$osoba->kod_p', '$osoba->id')";*/
				
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo');
				$db = mysql_select_db('klaudynna_cba_pl', $bd);
				
				//$sql = "UPDATE Pracownicy SET imie='$imie', nazwisko='$nazwisko', naz_pan='$naz_pan', plec='$plec', email='$email', kod_p='$kod_p' WHERE id = '$idpracownika';";

                mysql_query($sql); 
                mysql_close($bd);
        }
            else
            {
            	if(!preg_match('/^[0-9]{2}+\-[0-9]{3}$/D', $_POST["kod_p"]) && preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $_POST["email"]))
	            {
	            	echo (' <form action="index.php?strona=2" method="post">
						<table> 
				
							<tr>
							<td align="left"> Nazwa filmu: </td>
							<td><input type="text" value="'.$_POST['imie'].'" name="imie"/></td> 
							</tr>
				
							<td align="left"> Reżyser: </td>
							<td><input type="text" value="'.$_POST['nazwisko'].'"  name="nazwisko"/></td> 
							
							<tr> 
								<td align="left"> Dostępność:</td> 
								'); 
									  if($plec=='tak') 
									  { 
										  echo(' 
										  <td> 
										  <input type="radio" name="plec" value="tak" checked/> Mężczyzna <br/>
										   <input type="radio" name="plec" value="nie"/> Kobieta <br/>
										   </td> 
										  '); 
									  } 
									  else 
									  { 
											echo(' 
									  <td> 
									  <input type="radio" name="plec" value="tak"/> Mężczyzna <br/>
									   <input type="radio" name="plec" value="nie"checked/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  echo(' 
							</tr>	
				
							<tr>
							<td align="left"> Produkcja: </td>
							<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> E-mail: </td>
							<td><input type="text" name="email" value="'.$_POST["email"].'"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod produktu: </td>
							<td><input type="text" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierały nieprawidłowy kod produktu.");
	            }
	            else if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/',$_POST["email"]) && preg_match('/^[0-9]{2}+\-[0-9]{3}$/D', $_POST["kod_p"]))
	            {
	            	echo (' <form action="index.php?strona=2" method="post">
						<table> 
				
							<tr>
							<td align="left"> Nazwa filmu: </td>
							<td><input type="text" value="'.$_POST["imie"].'" name="imie"/></td> 
							</tr>
				
							<td align="left"> Reżyser: </td>
							<td><input type="text" value="'.$_POST["nazwisko"].'"  name="nazwisko"/></td> 
				
							
							<tr> 
								<td align="left"> Dostępność:</td> 
								'); 
									  if($plec=='tak') 
									  { 
									  echo(' 
									  <td> 
									  <input type="radio" name="plec" value="tak"checked/> Mężczyzna  <br/>
									   <input type="radio" name="plec" value="nie"/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  else 
									  { 
											echo(' 
									  <td> 
									  <input type="radio" name="plec" value="tak"/> Mężczyzna  <br/>
									   <input type="radio" name="plec" value="nie"checked/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  echo(' 
							</tr>	
				
							<tr>
							<td align="left"> Produkcja: </td>
							<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> E-mail: </td>
							<td><input type="text" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod produktu: </td>
							<td><input type="text" value='.$_POST["kod_p"].' name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierają nieprawidłowy email.");
	             
				}
				
				//nieprawidlowy adres email i Kod produktu
	            else if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/',$_POST["email"]) && !preg_match("(\b\d{2}-\d{3}\b)", $_POST["kod_p"]))
	            {
	            	echo (' <form action="index.php?strona=2" method="post">
						<table> 
				
							<tr>
							<td align="left"> Nazwa filmu</td>
							<td><input type="text" value="'.$_POST["imie"].'" name="imie"/></td> 
							</tr>
				
							<td align="left"> Reżyser: </td>
							<td><input type="text" value="'.$_POST["nazwisko"].'"  name="nazwisko"/></td> 
				
							
							<tr> 
                                    <td align="left"> Dostępność </td> 
                                    '); 
                                          if($plec=='tak') 
                                          { 
                                          echo(' 
                                          <td> 
                                          <input type="radio" name="plec" value="tak"checked/> Mężczyzna  <br/>
                                           <input type="radio" name="plec" value="nie"/> Kobieta <br/>
                                           </td> 
                                          '); 
                                          } 
                                          else 
                                          { 
                                                echo(' 
                                          <td> 
                                          <input type="radio" name="plec" value="tak"/> Mężczyzna  <br/>
                                           <input type="radio" name="plec" value="nie"checked/> Kobieta <br/>
                                           </td> 
                                          '); 
                                          } 
                                          echo(' 
                                </tr>	
				
							<tr>
							<td align="left"> Produkcja: </td>
							<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> E-mail: </td>
							<td><input type="text" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod produktu: </td>
							<td><input type="text" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierają nieprawidłowy adres email i Kod produktu.");

	            }
	            
	            //////////////////
            
            }
        }
		
		else if(empty($_SESSION["email"]) && !empty($_SESSION["kod_p"]))
	            {
	            	echo (' <form action="index.php?strona=2" method="post">
						<table> 
				
							<tr>
							<td align="left"> Nazwa filmu: </td>
							<td><input type="text" value="'.$_POST["imie"].'" name="imie"/></td> 
							</tr>
				
							<td align="left"> Reżyser: </td>
							<td><input type="text" value="'.$_POST["nazwisko"].'"  name="nazwisko"/></td> 
				
							
							<tr> 
								<td align="left"> Dostępność:</td> 
								'); 
									  if($osoba->plec=='tak') 
									  { 
									  echo(' 
									  <td> 
									  <input type="radio" name="plec" value="tak"checked/> Mężczyzna  <br/>
									   <input type="radio" name="plec" value="nie"/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  else 
									  { 
											echo(' 
									  <td> 
									  <input type="radio" name="plec" value="tak"/> M뀣ężczyzna  <br/>
									   <input type="radio" name="plec" value="nie"checked/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  echo(' 
							</tr>	
				
							<tr>
							<td align="left"> Produkcja: </td>
							<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> E-mail: </td>
							<td><input type="text" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod produktu: </td>
							<td><input type="text" name="kod_p" value='.$_POST["kod_p"].' /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierają nieprawidłowy email.");
	             
				}
				else if(empty($_SESSION["kod_p"]) && !empty($_SESSION["email"]))
	            {
	            	echo (' <form action="index.php?strona=2" method="post">
						<table> 
				
							<tr>
							<td align="left"> Nazwa filmu: </td>
							<td><input type="text" value="'.$_POST["imie"].'" name="imie"/></td> 
							</tr>
				
							<td align="left"> Reżyser: </td>
							<td><input type="text" value="'.$_POST["nazwisko"].'"  name="nazwisko"/></td> 
							
							<tr> 
								<td align="left"> Dostępność:</td> 
								'); 
									  if($osoba::$plec=='tak') 
									  { 
										  echo(' 
										  <td> 
										  <input type="radio" name="plec" value="tak" checked/> Mężczyzna <br/>
										   <input type="radio" name="plec" value="nie"/> Kobieta <br/>
										   </td> 
										  '); 
									  } 
									  else 
									  { 
											echo(' 
									  <td> 
									  <input type="radio" name="plec" value="tak"/> Mężczyzna <br/>
									   <input type="radio" name="plec" value="nie"checked/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  echo(' 
							</tr>	
				
							<tr>
							<td align="left"> Produkcja: </td>
							<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> E-mail: </td>
							<td><input type="text" name="email" value="'.$_POST["email"].'"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod produktu: </td>
							<td><input type="text" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierały nieprawidłowy Kod produktu.");
	            }
				
				else if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/',$_POST["email"]) && !preg_match("(\b\d{2}-\d{3}\b)", $_POST["kod_p"]))
	            {
	            	echo (' <form action="index.php?strona=2" method="post">
						<table> 
				
							<tr>
							<td align="left"> Nazwa filmu</td>
							<td><input type="text" value="'.$_POST["imie"].'" name="imie"/></td> 
							</tr>
				
							<td align="left"> Reżyser: </td>
							<td><input type="text" value="'.$_POST["nazwisko"].'"  name="nazwisko"/></td> 
				
							
							<tr> 
                                    <td align="left"> Dostępność: </td> 
                                    '); 
                                          if($osoba->plec=='tak') 
                                          { 
                                          echo(' 
                                          <td> 
                                          <input type="radio" name="plec" value="tak"checked/> Mężczyzna  <br/>
                                           <input type="radio" name="plec" value="nie"/> Kobieta <br/>
                                           </td> 
                                          '); 
                                          } 
                                          else 
                                          { 
                                                echo(' 
                                          <td> 
                                          <input type="radio" name="plec" value="tak"/> Mężczyzna  <br/>
                                           <input type="radio" name="plec" value="nie"checked/> nie <br/>
                                           </td> 
                                          '); 
                                          } 
                                          echo(' 
                                </tr>	
				
							<tr>
							<td align="left"> Produkcja: </td>
							<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> E-mail: </td>
							<td><input type="text" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod produktu: </td>
							<td><input type="text" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierają nieprawidłowy adres email i Kod produktu.");

	            }
		else
		{
		
        
        echo (' <form action="index.php?strona=2" method="post">
					<table> 
			
						<tr>
						<td align="left"> Nazwa filmu</td>
						<td><input type="text" value="'.$_POST["imie"].'" name="imie"/></td> 
						</tr>
			
						<td align="left"> Reżyser: </td>
						<td><input type="text" value="'.$_POST["nazwisko"].'" name="nazwisko"/></td> 
			
						
						<tr> 
							<td align="left"> Dostępność:</td> 
							'); 
								  if($osoba->plec=="tak") 
								  { 
								  echo(' 
								  <td> 
								  <input type="radio" name="plec" value="tak" checked/> Mężczyzna  <br/>
								   <input type="radio" name="plec" value="nie"/> Kobieta <br/>
								   </td> 
								  '); 
								  } 
								  else
								  { 
										echo(' 
								  <td> 
								  <input type="radio" name="plec" value="tak"/> Mężczyzna  <br/>
								   <input type="radio" name="plec" value="nie"checked/> Kobieta <br/>
								   </td> 
								  '); 
								  } 
								  echo(' 
						</tr>	
			
						<tr>
						<td align="left"> Produkcja: </td>
						<td><input type="text" value="'.$_POST["naz_pan"].'" name="naz_pan"/></td> 
						</tr>
						
						<tr>
						<td align="left"> E-mail: </td>
						<td><input type="text" value="'.$_POST["email"].'" name="email"/></td> 
						</tr>
			
						<tr>
						<td align="left"> Kod produktu: </td>
						<td><input type="text" value="'.$_POST["kod_p"].'" name="kod_p" /></td> 
						</tr>
			
						<tr>
						<td align="center">
						<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
						</td>
					
						</tr>
			
					</table>
			
		 		</form>');

        echo("Nie wypełniono wszystkich pól");
        }
    } 
else{

	$lol = $_GET["id"];
	
	$zapytanie = "SELECT * FROM Pracownicy WHERE id = '$lol'";
	$wynik = mysql_query($zapytanie); 
	
 echo (' <form action="index.php?strona=2" method="post">
		<table> 

			<tr>
			<td align="left"> Nazwa filmu</td>
			<td><input type="text" name="imie" /></td> 
			</tr>

			<td align="left"> Rezyser: </td>
			<td><input type="text" name="nazwisko" /></td> 

			
			<tr> 
				<td align="left"> Dostepnosc:</td> 

					  <td> 
					  <input type="radio" name="plec" value="tak"/> Tak  <br/>
					   <input type="radio" name="plec" value="nie"/> Nie <br/>
					   </td> 
            </tr>	

			<tr>
			<td align="left"> Produkcja: </td>
			<td><input type="text" name="naz_pan" /></td> 
			</tr>
			
			<tr>
			<td align="left"> Dystrybutor(E-mail): </td>
			<td><input type="text" name="email" /></td> 
			</tr>

			<tr>
			<td align="left"> Kod produktu: </td>
			<td><input type="text" name="kod_p"  /></td> 
			</tr>

			<tr>
			<td align="left">
			<td> <input type="submit" value="wyslij" name="wyslij"/><input type="submit" value="anuluj" name="anuluj"/> </td>
			</td>
		
			</tr>

		</table>
	
 </form>');
 }
?>