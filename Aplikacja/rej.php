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
				
				
					
					
					if(isset($_POST["submit1"])) {
						if(!empty($_POST["login2"]) && !empty($_POST["imiee"]) && !empty($_POST["nazwiskoo"]) && !empty($_POST["haslo"]) && $_POST["haslo"] == $_POST["haslo2"] && strlen($_POST["login2"]) > 5 && strlen($_POST["haslo"]) > 5)
						{
						
						
						$nowyLog = new logowanie();
						//$operacjeSQL = new pozostaleOperacje();
						
						$nowyLog->uzupelnijDane($_POST["login2"], $_POST["haslo"], $_POST["imiee"], $_POST["nazwiskoo"]);
						$nowyLog->doSesji();
						
						

						$id_pol = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo');
						if(!isset($id_pol))
						{
						echo 'Blad1';
						}
						else
						{
						$id_bazy = mysql_select_db('klaudynna_cba_pl');
						if(!isset($id_pol))
						echo 'blad2';
						else
						{
						$sql_uz1 = mysql_query("SELECT COUNT(*) AS liczba FROM uzytkownicy WHERE login = '$nowyLog->login2'");
						$result_uz1 = mysql_fetch_assoc($sql_uz1);
						$licz_uz1 = $result_uz1['liczba']; 
						if($licz_uz1 ==0)
						{
						$nowyLog->wyswietl();			

						
						$nowy = "INSERT INTO uzytkownicy 
								VALUES('$nowyLog->login2', '$nowyLog->haslo', '1', '$nowyLog->imiee', '$nowyLog->nazwiskoo', '$id')";
						$id_zap = mysql_query($nowy);
						if(!isset($id_zap)) echo 'blad3';
						}
						if($licz_uz1 != 0)
						{
							?>
<form action="index.php?strona=11" method="post">
                        <table>
                            <tr>
                            	<td> Login: </td>
                                <td> <input type="text" name="login2"/> </td>								
                            </tr>
                            <tr>
                            	<td> Hasło: </td>
                                <td> <input type="password" name="haslo" value="<?php echo isset($_POST['haslo']) ? $_POST['haslo'] : ''?>"/></td>
                            </tr>
							<tr>
                            	<td> Powtórz hasło:: </td>
                                <td> <input type="password" name="haslo2" value="<?php echo isset($_POST['haslo2']) ? $_POST['haslo2'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Imię: </td>
								<td> <input type="text" name="imiee" value="<?php echo isset($_POST['imiee']) ? $_POST['imiee'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Nazwisko: </td>
                                <td> <input type="text" name="nazwiskoo" value="<?php echo isset($_POST['nazwiskoo']) ? $_POST['nazwiskoo'] : ''?>"/></td>
                            </tr>
                            <tr>
						</table>
                        <input type="submit" name = "submit1" value="Wyślij">
                    </form>
<?php
						echo "Konto z danymi, jakie zostały podane wyżej, już istnieje! Zmień login.";
						}
						}
						}
						mysql_close($id_pol);
						

}
if(empty($_POST["imiee"]) || empty($_POST["nazwiskoo"]) || empty($_POST["haslo"]) || empty($_POST["login2"]))
{
?>
<form action="index.php?strona=11" method="post">
                        <table>
                            <tr>
                            	<td> Login: </td>
                                <td> <input type="text" name="login2" value="<?php echo isset($_POST['login2']) ? $_POST['login2'] : ''?>"/> </td>								
                            </tr>
                            <tr>
                            	<td> Hasło: </td>
                                <td> <input type="password" name="haslo" value="<?php echo isset($_POST['haslo']) ? $_POST['haslo'] : ''?>"/></td>
                            </tr>
							<tr>
                            	<td> Powtórz hasło:: </td>
                                <td> <input type="password" name="haslo2" value="<?php echo isset($_POST['haslo2']) ? $_POST['haslo2'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Imię: </td>
								<td> <input type="text" name="imiee" value="<?php echo isset($_POST['imiee']) ? $_POST['imiee'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Nazwisko: </td>
                                <td> <input type="text" name="nazwiskoo" value="<?php echo isset($_POST['nazwiskoo']) ? $_POST['nazwiskoo'] : ''?>"/></td>
                            </tr>
                            <tr>
						</table>
                        <input type="submit" name = "submit1" value="Wyślij">
                    </form>
<?php
echo "Źle wypełniony formularz! ";
}
if($_POST["haslo"] != $_POST["haslo2"]){
?>
<form action="index.php?strona=11" method="post">
                        <table>
                            <tr>
                            	<td> Login: </td>
                                <td> <input type="text" name="login2" value="<?php echo isset($_POST['login2']) ? $_POST['login2'] : ''?>"/> </td>								
                            </tr>
                            <tr>
                            	<td> Hasło: </td>
                                <td> <input type="password" name="haslo"/></td>
                            </tr>
							<tr>
                            	<td> Powtórz hasło:: </td>
                                <td> <input type="password" name="haslo2"/></td>
                            </tr>
                            <tr>
                            	<td> Imię: </td>
								<td> <input type="text" name="imiee" value="<?php echo isset($_POST['imiee']) ? $_POST['imiee'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Nazwisko: </td>
                                <td> <input type="text" name="nazwiskoo" value="<?php echo isset($_POST['nazwiskoo']) ? $_POST['nazwiskoo'] : ''?>"/></td>
                            </tr>
                            <tr>
						</table>
                        <input type="submit" name = "submit1" value="Wyślij">
                    </form>
<?php
echo "Hasła nie są takie same!";
}
if(strlen($_POST["login2"]) <= 5 || strlen($_POST["haslo"]) <= 5)
{
	?>
<form action="index.php?strona=11" method="post">
                        <table>
                            <tr>
                            	<td> Login: </td>
                                <td> <input type="text" name="login2" /> </td>								
                            </tr>
                            <tr>
                            	<td> Hasło: </td>
                                <td> <input type="password" name="haslo" /></td>
                            </tr>
							<tr>
                            	<td> Powtórz hasło:: </td>
                                <td> <input type="password" name="haslo2" /></td>
                            </tr>
                            <tr>
                            	<td> Imię: </td>
								<td> <input type="text" name="imiee" value="<?php echo isset($_POST['imiee']) ? $_POST['imiee'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Nazwisko: </td>
                                <td> <input type="text" name="nazwiskoo" value="<?php echo isset($_POST['nazwiskoo']) ? $_POST['nazwiskoo'] : ''?>"/></td>
                            </tr>
                            <tr>
						</table>
                        <input type="submit" name = "submit1" value="Wyślij">
                    </form>
<?php
	echo "Login lub hasło za krótkie!";
}
}

if(!isset($_POST["submit1"]))
{
	?>
<form action="index.php?strona=11" method="post">
                        <table>
                            <tr>
                            	<td> Login: </td>
                                <td> <input type="text" name="login2" value="<?php echo isset($_POST['login2']) ? $_POST['login2'] : ''?>"/> </td>								
                            </tr>
                            <tr>
                            	<td> Hasło: </td>
                                <td> <input type="password" name="haslo" value="<?php echo isset($_POST['haslo']) ? $_POST['haslo'] : ''?>"/></td>
                            </tr>
							<tr>
                            	<td> Powtórz hasło:: </td>
                                <td> <input type="password" name="haslo2" value="<?php echo isset($_POST['haslo2']) ? $_POST['haslo2'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Imię: </td>
								<td> <input type="text" name="imiee" value="<?php echo isset($_POST['imiee']) ? $_POST['imiee'] : ''?>"/></td>
                            </tr>
                            <tr>
                            	<td> Nazwisko: </td>
                                <td> <input type="text" name="nazwiskoo" value="<?php echo isset($_POST['nazwiskoo']) ? $_POST['nazwiskoo'] : ''?>"/></td>
                            </tr>
                            <tr>
						</table>
                        <input type="submit" name = "submit1" value="Wyślij">
                    </form>
<?php
}
?>
