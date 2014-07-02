<?php
//session_start();
mysql_connect("mysql.cba.pl","klaudynna","haslo");
mysql_select_db("klaudynna_cba_pl");

if(isset($_SESSION['zalogowany'])) {
echo "Witam, ".$_SESSION['imie'];
}
else
{

if(isset($_POST['wyslij'])) {
		$looogin=$_POST["login"];
		$haaaslo=$_POST["haslo"];
		$sql_uz2 = mysql_query("SELECT COUNT(*) AS liczbaa FROM uzytkownicy WHERE login = '$looogin' && haslo = '$haaaslo' ");
		$result_uz2 = mysql_fetch_assoc($sql_uz2);
		$licz_uz2 = $result_uz2['liczbaa']; 
		if($licz_uz2 != 0)
		{		
		$zmienna = mysql_query("SELECT uprawnienia, imie FROM uzytkownicy
		WHERE login = '".$_POST['login']."' 
		&& haslo = '".$_POST['haslo']."' "); 
		$wiersz = mysql_fetch_row($zmienna);
		if(isset($zmienna))
		{
           $_SESSION['zalogowany'] = true;
           $_SESSION['login'] = $_POST['login'];
           $_SESSION['haslo'] = $_POST['haslo'];
		   $_SESSION['uprawnienia'] = $wiersz[0];
		   $_SESSION['imie'] = $wiersz[1];
           echo "Jesteś zalogowany jako " .$_SESSION['imie'];
			header('location: index.php');
		}
			}						
			if($licz_uz2 == 0)
			{
			echo "Nie ma takiego użytkownika lub złe hasło!";
			}
			
} 

else { 

?>
<form method='POST' action='index.php?strona=10'>
<table>
    <tr>
        <td>Login:<input type='text' name='login'><br></td>
		</tr>
	<tr>
		<td>Hasło:<input type='password' name='haslo'><br></td>
	</tr>
	<tr>
		<td><input type='submit' value='Zaloguj' name='wyslij'></td>
	</tr>
</table>
</form>
<?php
}
}
?>