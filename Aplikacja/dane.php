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


if(isset($_POST["odrzuc"]))
{
	header('location: index.php');
	}

if(isset($_POST["wyslij"]))
{
				$login4 = $_GET["login4"];
				$login2 = $_POST["login2"];
				$imie1 = $_POST["imiee"];
				$nazwisko1 = $_POST["nazwiskoo"];
				$haslo1 = $_POST["haslo"];
	
	if(!empty($_POST["login2"]) && !empty($_POST["imiee"]) && !empty($_POST["nazwiskoo"]) && !empty($_POST["haslo"]) && $_POST["haslo"] == $_POST["haslo2"] && strlen($_POST["login2"]) > 5 && strlen($_POST["haslo"]) > 5)
	{ 
      
		  echo "<br>";
		        echo ("Login: ");
                echo ($_POST["login2"]);
				
				echo('<br/>');
                echo ("Imię: ");
                echo ($_POST["imiee"]);
                
                echo('<br/>');
                echo ("Nazwisko: ");
                echo ($_POST["nazwiskoo"]);
                
                echo('<br/>');
                echo ("Hasło: ");
                echo ($_POST["haslo"]);
                
                echo("<br/>");
                echo("<br/>");
				
				$login4 = $_GET["login4"];
				$login2 = $_POST["login2"];
				$imie1 = $_POST["imiee"];
				$nazwisko1 = $_POST["nazwiskoo"];
				$haslo1 = $_POST["haslo"];
				
				//$sql = "INSERT INTO Pracownicy (imie, nazwisko ,nazwisko_panienskie, plec, email, kod_pocztowy) VALUES ('$imie','$nazwisko',  '$naz_pan', '$plec', '$email', '$kod_p') "; 
				
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo');
				$db = mysql_select_db('klaudynna_cba_pl', $bd);
				
				$sql = "UPDATE uzytkownicy SET imie='$imie1', nazwisko='$nazwisko1', login='$login2', haslo='$haslo1' WHERE login = '$login4'";

                mysql_query($sql); 
                mysql_close($bd);
        }
		if(empty($_POST["imiee"]) || empty($_POST["nazwiskoo"]) || empty($_POST["haslo"]) || empty($_POST["login2"]))
		{
		echo "Źle wypełniony formularz! ";
		}
		if($_POST["haslo"] != $_POST["haslo2"]){
		echo "Hasła nie są takie same!";
}
if(strlen($_POST["login2"]) <= 5 || strlen($_POST["haslo"]) <= 5)
{
echo (' <form action="index.php?strona=12&login4='.$_SESSION['login'].'" method="post">
					<table> 
			
						<tr>
						<td align="left"> Login: </td>
						<td><input type="text" value="'.$login4.'" name="login2"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Haslo: </td>
						<td><input type="password" name="haslo"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Powtorz haslo: </td>
						<td><input type="password" name="haslo2"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Imie: </td>
						<td><input type="text" value="'.$imie1.'" name="imiee"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Nazwisko: </td>
						<td><input type="text" value="'.$nazwisko1.'" name="nazwiskoo"/></td> 
						</tr>
						
						<tr>
						<td align="center">
						<td> <input type="submit" value="Potwierdź zmiany" name="wyslij"/> </td>
						</td>
						
						<tr>
						<td align="center">
						<td> <input type="submit" value="Odrzuć zmiany" name="odrzuc"/> </td>
						</td>
					
						</tr>
						</table>
						</form>');
	echo "Login lub hasło za krótkie!";
}
        }
else{

	$lol = $_SESSION['login'];
	
	$zapytanie = "SELECT * FROM uzytkownicy WHERE login = '$lol'";
	$wynik = mysql_query($zapytanie); 
	
	$i = 0;
	$login2=mysql_result($wynik,$i,"login"); 
	$imie2=mysql_result($wynik,$i,"imie"); 
	$nazwisko2=mysql_result($wynik,$i,"nazwisko"); 
	$haslo2=mysql_result($wynik,$i,"haslo");
	//$haslo3=mysql_result($wynik,$i,"haslo");	
        echo (' <form action="index.php?strona=12&login4='.$_SESSION['login'].'" method="post">
					<table> 
			
						<tr>
						<td align="left"> Login: </td>
						<td><input type="text" value="'.$login2.'" name="login4"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Haslo: </td>
						<td><input type="password" name="haslo"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Powtorz haslo: </td>
						<td><input type="password" name="haslo2"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Imie: </td>
						<td><input type="text" value="'.$imie2.'" name="imiee"/></td> 
						</tr>
						
						<tr>
						<td align="left"> Nazwisko: </td>
						<td><input type="text" value="'.$nazwisko2.'" name="nazwiskoo"/></td> 
						</tr>
						
						<tr>
						<td align="center">
						<td> <input type="submit" value="Potwierdź zmiany" name="wyslij"/> </td>
						</td>
						
						<tr>
						<td align="center">
						<td> <input type="submit" value="Odrzuć zmiany" name="odrzuc"/> </td>
						</td>
					
						</tr>
						</table>
						</form>');
 }
?>