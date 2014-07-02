				<?php			
				$iduzytkownika= $_GET['id'];
				if(isset($_POST["tak"]))
				{
				$iduzytkownika= $_GET['id'];
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo'); 
				$db = mysql_select_db('klaudynna_cba_pl'); 
				mysql_select_db ($db, $bd);
				$strSQL =  "DELETE FROM uzytkownicy WHERE id='$iduzytkownika'";
        		mysql_query ($strSQL);        
        		mysql_close ($bd);
				echo("Operacja wykonana pomyślnie");
				echo (' <form action="index.php?strona=14&page=1" method="post">
				<input type="submit" value="OK" name="OK"/>
				');
				
				}
				else if(isset($_POST["nie"]))
				{
					include("usprac.php");
				}
				else
				{
				$iduzytkownika= $_GET['id'];	
				$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo'); 
				$db = mysql_select_db('klaudynna_cba_pl'); 
				mysql_select_db ($db, $bd);	
				$result = mysql_query ($strSQL);
				mysql_close ($bd);
				echo("Czy na pewno chcesz usunąć pracownika?");
				echo ('<form action="index.php?strona=16&id='.$iduzytkownika.'" method="post">
				<input type="submit" value="tak" name="tak"/> <input type="submit" value="nie" name="nie"/>
				');
				}
?>
