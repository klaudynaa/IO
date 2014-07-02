<?php
session_start();
if(isset($_SESSION['licznik']))
{
$_SESSION['licznik'] = 0;
}
//$_SESSION['licznik']++;
?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="Description" content="Strona na Systemy Internetowe" />
	<meta name="Keywords" content="systemy,internetowe" />
	<title>Systemy Internetowe</title>
	<link rel = "Stylesheet" type = "text/css" href = "styl.css">
	
</head>

<div id = "zew">
	<div id = "naglowek">
	</div>
	<div id = "menu">
	<table>
	<table border = "1">
		<tr><td><a href="index.php?strona=1">Strona główna</a></td></tr><br />
		<?php 
		if(isset($_SESSION['zalogowany']))
		{
		if($_SESSION['uprawnienia'] == 1 || $_SESSION['uprawnienia'] == 2 || $_SESSION['uprawnienia'] == 3 || $_SESSION['uprawnienia'] == 4)
		{
		?>
		<tr><td><a href="index.php?strona=2">Formularz</a></td></tr><br />
		<tr><td><a href="index.php?strona=3">Zawartość sesji</a></td></tr>
        <tr><td><a href="index.php?strona=4">Baza filmow</a></td></tr>
		<tr><td><a href="index.php?strona=12">Zmiana danych</a></td></tr>
		<?php
		}
		if($_SESSION['uprawnienia'] == 2 || $_SESSION['uprawnienia'] == 3 || $_SESSION['uprawnienia'] == 4)
		{
		?>
        <tr><td><a href="index.php?strona=5">Edycja filmow</a></td></tr>
		<?php
		}
		if($_SESSION['uprawnienia'] == 3 || $_SESSION['uprawnienia'] == 4)
		{
		?>
        <tr><td><a href="index.php?strona=6">Usunięcie filmu</a></td></tr>
		<?php
		}
		if($_SESSION['uprawnienia'] == 4)
		{
		?>
		<tr><td><a href="index.php?strona=13">Zmiana poziomu dostępu</a></td></tr>
		<tr><td><a href="index.php?strona=14">Usunnięcie użytkownika</a></td></tr>
		<?php
		}
		}
		?>
	</table>
	</div>
	<div id = "formularz">
	<?php
		if(isset($_GET["strona"]))
			$strona=$_GET["strona"];
			else $strona = 1;
				if($strona == 1) echo "Witaj ".$_SESSION['imie'];
				if($strona == 10) include("log.php");
				if($strona == 11) include("rej.php");
				if(isset($_SESSION['zalogowany']))
				{
				if($_SESSION['uprawnienia'] == 1 || $_SESSION['uprawnienia'] == 2 || $_SESSION['uprawnienia'] == 3 || $_SESSION['uprawnienia'] == 4)
				{
				if($strona == 15) include("search.php");
				if($strona == 2) include("form.php");
				if($strona == 3) include("session.php");
                if($strona == 4) include("baza2.php");
				if($strona == 12) include("dane.php");
				}
				if($_SESSION['uprawnienia'] == 2 || $_SESSION['uprawnienia'] == 3 || $_SESSION['uprawnienia'] == 4)
				{
                if($strona == 5) include("baza1.php");
				}
				if($_SESSION['uprawnienia'] == 3 || $_SESSION['uprawnienia'] == 4)
				{
				if($strona == 6) include("baza.php");
				}
				if($strona == 7) include("potw1.php");
				if($strona == 9) include("potw.php");
				if($_SESSION['uprawnienia'] == 4)
				{
				if($strona == 13) include("zmiana.php");
				if($strona == 14) include("usprac.php");
				if($strona == 16) include("potw2.php");
				if($strona == 17) include("potw3.php");
				}
				}
?>
	</div>
	<div id = "lista">
	<ul type="circle">
	<?php
	if($_SESSION['uprawnienia'] !=0) {
	?>
	<form method="post" action="index.php?strona=15">
	<input type="text" name="zapytanie">
	<input type="submit" value="szukaj">
	</form>
	<?php 
	}
	?>
	<?php
	if(!isset($_SESSION['zalogowany'])) {
	?>
	<li><a href="index.php?strona=10">Zaloguj</a></li>
	<?php
	}
	?>
	<li><a href="index.php?strona=11">Rejestracja</a></li>
	<?php
	if(isset($_SESSION['zalogowany']))
	{
	?>
	<form method='POST' action='index.php'>
	<input type='submit' value='Wyloguj' name='wyloguj'>
	</form>
	</ul>
	<?php
	
	if(isset($_POST['wyloguj'])) {
	session_destroy();
	echo "Zostałeś wylogowany";
	header('location: index.php');
	}
	}
	?>	
	<a href="http://www.google.pl"><img src="http://findicons.com/files/icons/519/handycons_2/128/google.png"/></a>
	</ul>
	</div>
	<div id = "stopka">
	<?php
	if($_SESSION['dodani'] < 0)
	{
		echo "Liczba dodanych pracowników: ".$_SESSION['dodani'];
		}
	?>
	</div>
</div>
</body>
</html>		