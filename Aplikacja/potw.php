				<?php			
				$idpracownika= $_GET['id'];
				if(isset($_POST["tak"]))
				{
				$idpracownika= $_GET['id'];
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo'); 
				$db = mysql_select_db('klaudynna_cba_pl'); 
				mysql_select_db ($db, $bd);
				$strSQL =  "DELETE FROM Pracownicy WHERE id='$idpracownika'";
				//echo("$strSQL");
        		mysql_query ($strSQL);        
        		mysql_close ($bd);
				echo("Operacja wykonana pomyślnie");
				echo (' <form action="index.php?strona=6&page=1" method="post">
				<input type="submit" value="OK" name="OK"/>
				');
				
				}
				else if(isset($_POST["nie"]))
				{
					include("baza.php");
				}
				else
				{
				$idpracownika= $_GET['id'];	
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo'); 
				$db = mysql_select_db('klaudynna_cba_pl'); 
				mysql_select_db ($db, $bd);
				//$strSQL =  "DELETE FROM Pracownicy WHERE id='$idpracownika'";	
				$result = mysql_query ($strSQL);
				mysql_close ($bd);
				$imie=mysql_result($result,0,"imie");
				$nazwisko=mysql_result($result,0,"nazwisko");
				echo("Czy na pewno chcesz usunąć pracownika $imie $nazwisko ?");
				echo ('<form action="index.php?strona=9&id='.$idpracownika.'" method="post">
				<input type="submit" value="tak" name="tak"/> <input type="submit" value="nie" name="nie"/>
				');
				}
?>
