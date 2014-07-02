<?php 
$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo');
$db = mysql_select_db('klaudynna_cba_pl'); 

if (!$bd) {
	  exit('<p>Nie można skontaktować się ' .
	      'w tej chwili z baza danych.</p>');
	}
if (!mysql_select_db('klaudynna_cba_pl')) {
	  exit('<p>Nie mo�na zlokalizowa� ' .
	      'w tej chwili bazy danych.</p>');
	}
/////////////////////////////////////////////////////////////
$perPage = 3;
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
$zapSQL = 'SELECT * FROM Pracownicy';
$zapytanieSQL = "SELECT * FROM Pracownicy ORDER BY id asc LIMIT $start, $perPage";

$wynik = mysql_query($zapytanieSQL);
$num=mysql_num_rows($wynik); 


$wynik1 = mysql_query($zapSQL);
$num1=mysql_num_rows($wynik1); 
$max=ceil($num1/$perPage);
$_SESSION['liczba_p'] = $num1;

class bazaInfoDane{
	public $id;
	public $imie;
	public $nazwisko;
	public $plec;
	public $nazwisko_p;
	public $email;
	public $kod;
	
	public function wyswietlZawartosc()
	{
		echo '<tr>';
		echo '<td width="50px">'.$this->id.'</td>';
		echo '<td width="100px">'.$this->imie.'</td>';
		echo '<td width="100px">'.$this->nazwisko.'</td>';
		echo '<td width="150px">'.$this->nazwisko_p.'</td>';
		echo '<td width="100px">'.$this->plec.'</td>';
		echo '<td width="180px">'.$this->email.'</td>';
		echo '<td width="100px">'.$this->kod.'</td>';
		echo '</tr>';
	}
}

class pozostale{

	public $temp;
	
	public function wyswietlNaglowki()
	{
	echo '<table border="1">';
	echo '<tr>'; 
	echo '<td width="50px"> <b> Id </td>';
	echo '<td width="100px"> <b> Nazwa filmu </td>';
	echo '<td width="100px"> <b> Reżyser </td>';
	echo '<td width="150px"> <b> Produkcja </td>';
	echo '<td width="100px"> <b> Dostępność </td>';
	echo '<td width="180px"> <b> Dystrybutor (email) </td>';
	echo '<td width="100px"> <b> Kod produktu </td>';
	echo '</tr>';
	}
	
}
	

$element = new bazaInfoDane();
$inny = new pozostale();

$inny->wyswietlNaglowki();

$i = 0;
while ($i < $num)
{
	$element->id=mysql_result($wynik,$i,"id"); 
	$element->imie=mysql_result($wynik,$i,"imie"); 
	$element->nazwisko=mysql_result($wynik,$i,"nazwisko"); 
	$element->plec=mysql_result($wynik,$i,"plec"); 
	$element->nazwisko_p=mysql_result($wynik,$i,"naz_pan"); 
	$element->email=mysql_result($wynik,$i,"email"); 
	$element->kod=mysql_result($wynik,$i,"kod_p"); 
	
	$element->wyswietlZawartosc();
	$i++;
}
echo '</table>';
 
$prev = $page - 1;
$next = $page + 1;



$prevLink = $_SERVER['index.php?strona=4'] . '?page=' . $prev;
$nextLink = $_SERVER['index.php?strona=4'] . '?page=' . $next;


///..................numery stron
			for($i=0; $i<$max; $i++)
			{
		
				$y=$i+1;
				//$start_tmp=$i*$perPage;
				$start_tmp=$i+1;
				echo " <a href=index.php?strona=4&page=$start_tmp>$y</a>";
				if(($i!=$max)-1)
				echo" |";
			}
				?>			