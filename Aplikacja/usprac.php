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
/////////////////////////////////////////////////////////////
$perPage = 13;
$page = $_GET['page'];

if (is_numeric($_REQUEST['page'])) {
	$page = (int) $_REQUEST['page'];
if ($page < 1) {
	$page = 1;
}
} 
else {
	$page = 1;
}
$start = ($page - 1) * $perPage;
$zapSQL = 'SELECT * FROM uzytkownicy';
$zapytanieSQL = "SELECT * FROM uzytkownicy ORDER BY id asc LIMIT $start, $perPage";

$wyyynik = mysql_query($zapytanieSQL);
$num=mysql_num_rows($wyyynik); 


$wyyynik1 = mysql_query($zapSQL);
$num1=mysql_num_rows($wyyynik1); 
$max=ceil($num1/$perPage);
$_SESSION['liczba_p'] = $num1;

echo '<table border="1">';
echo '<tr>';
echo '<td width="60px"> <b> Usuń </td>';
echo '<td width="50px"> <b> Login </td>';
echo '<td width="100px"> <b> Imię </td>';
echo '<td width="150px"> <b> Nazwisko </td>';

echo '</tr>';

$i = 0;
while ($i < $num)
{
	$loogin=mysql_result($wyyynik,$i,"login");
	$imie=mysql_result($wyyynik,$i,"imie"); 
	$nazwisko=mysql_result($wyyynik,$i,"nazwisko"); 
	$id=mysql_result($wyyynik,$i,"id");
	$uprawnienia=mysql_result($wyyynik,$i, "uprawnienia");
	
	echo '<tr>';
	if($uprawnienia < 4)
	{
	echo '<td width="60px"> <a href="index.php?strona=16&id='.$id.'">Usuń</a></td>';
	}
	else
	{
		echo '<td width="60px"> Nie ma! </td>';
		}
	echo '</td>';
	echo '<td width="50px">'.$loogin.'</td>';
	echo '<td width="100px">'.$imie.'</td>';
	echo '<td width="150px">'.$nazwisko.'</td>';

	
	echo '</tr>';
	$i++;
}
echo '</table>';
 
$prev = $page - 1;
$next = $page + 1;



$prevLink = $_SERVER['index.php?strona=14'] . '?page=' . $prev;
$nextLink = $_SERVER['index.php?strona=14'] . '?page=' . $next;


///..................numery stron
			for($i=0; $i<$max; $i++)
			{
		
				$y=$i+1;
				//$start_tmp=$i*$perPage;
				$start_tmp=$i+1;
				echo " <a href=index.php?strona=14&page=$start_tmp>$y</a>";
				if(($i!=$max)-1)
				echo" |";
			}
				?>			