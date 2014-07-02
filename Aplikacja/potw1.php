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




if(isset($_POST["wyslij"]))
{
	  			$idpracownika = $_GET["id"];
				$imie = $_POST["imie"];
				$nazwisko = $_POST["nazwisko"];
				$naz_pan = $_POST["naz_pan"];
				$email = $_POST["email"];
				$kod_p = $_POST["kod_p"];
				$plec = $_POST["plec"];
	
	if(!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["naz_pan"]) && !empty($_POST["email"]) && !empty($_POST["kod_p"]))
	{ 
      
	  			$idpracownika = $_GET["id"];
				$imie = $_POST["imie"];
				$nazwisko = $_POST["nazwisko"];
				$naz_pan = $_POST["naz_pan"];
				$email = $_POST["email"];
				$kod_p = $_POST["kod_p"];
				$plec = $_POST["plec"];
      if(preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $_POST["email"]) && preg_match('/^[0-9]{2}+\-[0-9]{3}$/D', $_POST["kod_p"]))
      {
		  echo "<br>";
		        echo ("id: ");
                echo ($_GET["id"]);
				
				echo('<br/>');
                echo ("Imię: ");
                echo ($_POST["imie"]);
                
                echo('<br/>');
                echo ("Nazwisko: ");
                echo ($_POST["nazwisko"]);
                
                echo('<br/>');
                echo ("Nazwisko panieńskie: ");
                echo ($_POST["naz_pan"]);
                
                echo('<br/>');
                echo ("Płeć: ");
                echo ($_POST["plec"]);
                
                echo('<br/>');
                echo ("E-mail: ");
                echo ($_POST["email"]);
                
                echo('<br/>');
                echo ("Kod pocztowy: ");
                echo ($_POST["kod_p"]);
                
                echo("<br/>");
                echo("<br/>");
				
				$idpracownika = $_GET["id"];
				$imie = $_POST["imie"];
				$nazwisko = $_POST["nazwisko"];
				$naz_pan = $_POST["naz_pan"];
				$email = $_POST["email"];
				$kod_p = $_POST["kod_p"];
				$plec = $_POST["plec"];
				
				//$sql = "INSERT INTO Pracownicy (imie, nazwisko ,nazwisko_panienskie, plec, email, kod_pocztowy) VALUES ('$imie','$nazwisko',  '$naz_pan', '$plec', '$email', '$kod_p') "; 
				
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo');
				$db = mysql_select_db('klaudynna_cba_pl', $bd);
				
				$sql = "UPDATE Pracownicy SET imie='$imie', nazwisko='$nazwisko', naz_pan='$naz_pan', plec='$plec', email='$email', kod_p='$kod_p' WHERE id = '$idpracownika';";

                mysql_query($sql); 
                mysql_close($bd);
        }
            else
            {
				//nieprawidlowy adres email
            	if(!(preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $_POST["email"])) && preg_match('/^[0-9]{2}+\-[0-9]{3}$/D', $_POST["kod_p"]))
	            {
	            	echo (' <form action="index.php?strona=7&id='.$_GET['id'].'" method="post">
						<table> 
				
							<tr>
							<td align="left"> Imię: </td>
							<td><input type="text" value="'.$imie.'" name="imie"/></td> 
							</tr>
				
							<td align="left"> nazwisko: </td>
							<td><input type="text" value="'.$nazwisko.'"  name="nazwisko"/></td> 
							
							<tr> 
								<td align="left"> Płeć:</td> 
								'); 
									  if($plec=='Mężczyzna') 
									  { 
										  echo(' 
										  <td> 
										  <input type="radio" name="plec" value="Mężczyzna" checked/> Mężczyzna <br/>
										   <input type="radio" name="plec" value="Kobieta"/> Kobieta <br/>
										   </td> 
										  '); 
									  } 
									  else 
									  { 
											echo(' 
									  <td> 
									  <input type="radio" name="plec" value="Mężczyzna"/> Mężczyzna <br/>
									   <input type="radio" name="plec" value="Kobieta"checked/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  echo(' 
							</tr>	
				
							<tr>
							<td align="left"> nazwisko panienskie: </td>
							<td><input type="text" value="'.$naz_pan.'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> e-mail: </td>
							<td><input type="text" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod pocztowy: </td>
							<td><input type="text" value="'.$kod_p.'" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyslij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierały nieprawidłowy adres email.");
	            }
				
				//nieprawidlowy kod pocztowy
	            else if(preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $_POST["email"]) && !(preg_match('/^[0-9]{2}+\-[0-9]{3}$/D', $_POST["kod_p"])))
	            {
	            	echo (' <form action="index.php?strona=7&id='.$_GET['id'].'" method="post">
						<table> 
				
							<tr>
							<td align="left"> Imię: </td>
							<td><input type="text" value="'.$imie.'" name="imie"/></td> 
							</tr>
				
							<td align="left"> nazwisko: </td>
							<td><input type="text" value="'.$nazwisko.'"  name="nazwisko"/></td> 
				
							
							<tr> 
								<td align="left"> Płeć:</td> 
								'); 
									  if($plec=='Mężczyzna') 
									  { 
									  echo(' 
									  <td> 
									  <input type="radio" name="plec" value="Mężczyzna"checked/> Mężczyzna  <br/>
									   <input type="radio" name="plec" value="Kobieta"/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  else 
									  { 
											echo(' 
									  <td> 
									  <input type="radio" name="plec" value="Mężczyzna"/> Mężczyzna  <br/>
									   <input type="radio" name="plec" value="Kobieta"checked/> Kobieta <br/>
									   </td> 
									  '); 
									  } 
									  echo(' 
							</tr>	
				
							<tr>
							<td align="left"> nazwisko panieńskie: </td>
							<td><input type="text" value="'.$naz_pan.'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> e-mail: </td>
							<td><input type="text" value="'.$email.'" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod pocztowy: </td>
							<td><input type="text" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyślij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierały nieprawidłowy kod pocztowy.");
	             
				}
				
				//nieprawidlowy adres email i kod pocztowy
	            else
	            {
	            	echo (' <form action="index.php?strona=7&id='.$_GET['id'].'" method="post">
						<table> 
				
							<tr>
							<td align="left"> Imię: </td>
							<td><input type="text" value="'.$imie.'" name="imie"/></td> 
							</tr>
				
							<td align="left"> nazwisko: </td>
							<td><input type="text" value="'.$nazwisko.'"  name="nazwisko"/></td> 
				
							
							<tr> 
                                    <td align="left"> Płeć:</td> 
                                    '); 
                                          if($plec=='Mężczyzna') 
                                          { 
                                          echo(' 
                                          <td> 
                                          <input type="radio" name="plec" value="Mężczyzna"checked/> Mężczyzna  <br/>
                                           <input type="radio" name="plec" value="Kobieta"/> Kobieta <br/>
                                           </td> 
                                          '); 
                                          } 
                                          else 
                                          { 
                                                echo(' 
                                          <td> 
                                          <input type="radio" name="plec" value="Mężczyzna"/> Mężczyzna  <br/>
                                           <input type="radio" name="plec" value="Kobieta"checked/> Kobieta <br/>
                                           </td> 
                                          '); 
                                          } 
                                          echo(' 
                                </tr>	
				
							<tr>
							<td align="left"> nazwisko panieńskie: </td>
							<td><input type="text" value="'.$naz_pan.'" name="naz_pan"/></td> 
							</tr>
							
							<tr>
							<td align="left"> e-mail: </td>
							<td><input type="text" name="email"/></td> 
							</tr>
				
							<tr>
							<td align="left"> Kod pocztowy: </td>
							<td><input type="text" name="kod_p" /></td> 
							</tr>
				
							<tr>
							<td align="center">
							<td> <input type="submit" value="wyślij" name="wyslij"/> </td>
							</td>
						
							</tr>
				
						</table>
				
			 		</form>');
	
	                      	echo("Pola formularza zawierały nieprawidłowy adres email i kod pocztowy.");

	            }
	            
	            //////////////////
            
            }
        }
		
		//Nie wypelniono wszystkich p�l
        else
		{
        
        echo (' <form action="index.php?strona=7&id='.$_GET['id'].'" method="post">
					<table> 
			
						<tr>
						<td align="left"> Imię: </td>
						<td><input type="text" value="'.$imie.'" name="imie"/></td> 
						</tr>
			
						<td align="left"> nazwisko: </td>
						<td><input type="text" value="'.$nazwisko.'" name="nazwisko"/></td> 
			
						
						<tr> 
							<td align="left"> Plec:</td> 
							'); 
								  if($plec=='Mężczyzna') 
								  { 
								  echo(' 
								  <td> 
								  <input type="radio" name="plec" value="Mężczyzna"checked/> Mężczyzna  <br/>
								   <input type="radio" name="plec" value="Kobieta"/> Kobieta <br/>
								   </td> 
								  '); 
								  } 
								  else 
								  { 
										echo(' 
								  <td> 
								  <input type="radio" name="plec" value="Mężczyzna"/> Mężczyzna  <br/>
								   <input type="radio" name="plec" value="Kobieta"checked/> Kobieta <br/>
								   </td> 
								  '); 
								  } 
								  echo(' 
						</tr>	
			
						<tr>
						<td align="left"> nazwisko panieńskie: </td>
						<td><input type="text" value="'.$naz_pan.'" name="naz_pan"/></td> 
						</tr>
						
						<tr>
						<td align="left"> e-mail: </td>
						<td><input type="text" value="'.$email.'" name="email"/></td> 
						</tr>
			
						<tr>
						<td align="left"> Kod pocztowy: </td>
						<td><input type="text" value="'.$kod_p.'" name="kod_p" /></td> 
						</tr>
			
						<tr>
						<td align="center">
						<td> <input type="submit" value="wyślij" name="wyslij"/> </td>
						</td>
					
						</tr>
			
					</table>
			
		 		</form>');

        echo("Nie wypełniono wszystkich pól!");
        }
    } 
else{

	$lol = $_GET["id"];
	
	$zapytanie = "SELECT * FROM Pracownicy WHERE id = '$lol'";
	$wynik = mysql_query($zapytanie); 
	
	$i = 0;
	$id2=mysql_result($wynik,$i,"id"); 
	$imie2=mysql_result($wynik,$i,"imie"); 
	$nazwisko2=mysql_result($wynik,$i,"nazwisko"); 
	$plec2=mysql_result($wynik,$i,"plec"); 
	$nazwisko_p2=mysql_result($wynik,$i,"naz_pan"); 
	$email2=mysql_result($wynik,$i,"email"); 
	$kod2=mysql_result($wynik,$i,"kod_p"); 
	
 echo (' <form action="index.php?strona=7&id='.$_GET['id'].'" method="post">
		<table> 

			<tr>
			<td align="left"> Imię: </td>
			<td><input type="text" name="imie" value="'.$imie2.'" /></td> 
			</tr>

			<td align="left"> nazwisko: </td>
			<td><input type="text" name="nazwisko" value="'.$nazwisko2.'"/></td> 

			
			<tr> 
				<td align="left"> Plec:</td> 
				'); 
					  if($plec2=='Mężczyzna') 
					  { 
					  echo(' 
					  <td> 
					  <input type="radio" name="plec" value="Mężczyzna" value="'.$plec2.'" checked/> Mężczyzna  <br/>
					   <input type="radio" name="plec" value="Kobieta"/> Kobieta <br/>
					   </td> 
					  '); 
					  } 
					  else 
					  { 
							echo(' 
					  <td> 
					  <input type="radio" name="plec" value="Mężczyzna"/> Mężczyzna  <br/>
					   <input type="radio" name="plec" value="Kobieta" value="'.$plec2.'" checked/> Kobieta <br/>
					   </td> 
					  '); 
					  } 
					  echo(' 
            </tr>	

			<tr>
			<td align="left"> nazwisko panieńskie: </td>
			<td><input type="text" name="naz_pan" value="'.$nazwisko_p2.'"/></td> 
			</tr>
			
			<tr>
			<td align="left"> e-mail: </td>
			<td><input type="text" name="email" value="'.$email2.'"/></td> 
			</tr>

			<tr>
			<td align="left"> Kod pocztowy: </td>
			<td><input type="text" name="kod_p" value="'.$kod2.'" /></td> 
			</tr>

			<tr>
			<td align="left">
			<td> <input type="submit" value="wyślij" name="wyslij"/><input type="submit" value="anuluj" name="anuluj"/> </td>
			</td>
		
			</tr>

		</table>
	
 </form>');
 }
?>