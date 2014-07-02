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
//$page = $_GET['page'];

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
echo '<td width="60px"> <b>Imię  </td>';
echo '<td width="50px"> <b> Nazwisko </td>';
echo '<td width="100px"> <b> Login </td>';
echo '<td width="100px"> <b> Uprawnienia </td>';
echo '<td width="100px"> <b> Zmiana </td>';

echo '</tr>';

$i = 0;
while ($i < $num)
{
	$loogin=mysql_result($wyyynik,$i,"login");
	$uprawnienia=mysql_result($wyyynik,$i,"uprawnienia");
	$imie=mysql_result($wyyynik,$i,"imie"); 
	$nazwisko=mysql_result($wyyynik,$i,"nazwisko"); 
	$id=mysql_result($wyyynik,$i,"id"); 
	
	echo '<tr>';
	echo '<td width="100px">'.$imie.'</td>';
	echo '<td width="150px">'.$nazwisko.'</td>';
	echo '<td width="50px">'.$loogin.'</td>';
	echo '<form action="index.php?strona=13" method="post">
		<td width="120px"> <center>		
		<select name="level">'; 
		
		
if ($uprawnienia==0) {
	echo '<option value="0" selected>0</option>
    <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>';}
 if ($uprawnienia==1) {echo '<option value="0">0</option>
          <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>';}
 if ($uprawnienia==2){echo '<option value="0" >0</option>
          <option value="1">1</option>
        <option value="2" selected>2</option>
        <option value="3">3</option>
        <option value="4">4</option>';}
 if ($uprawnienia==3){echo '<option value="0" >0</option>
          <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>';}
 if ($uprawnienia==4){echo '<option value="0">0</option>
          <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4" selected>4</option>';}
		echo '
		</select></center>
		</td>
		<td align="center">';
	if($uprawnienia < 4 )
			echo '<center><input type="submit" name="user_lvl" value="Potwierdź" /></center>';
		else
			echo '<center>Nie ma!</center>'; 
		echo '
				<input type="hidden" name="login_confrim" value="'.$loogin.'"/>
		</td>
		</form>';
	echo '</tr>';
	$i++;
}
echo '</table>';

$lvl = $_POST['level'];
$user_login = $_POST['login_confrim'];

	if(isset($_POST['user_lvl']))
	{
		$lvl = $_POST['level'];
		$user_login = $_POST['login_confrim'];
		$sql = "UPDATE `uzytkownicy` SET uprawnienia='$lvl' WHERE login = '$user_login';";
		$query = mysql_query($sql) or die(mysql_error());	
		header("Location: index.php?strona=13");
	}
 
$prev = $page - 1;
$next = $page + 1;



$prevLink = $_SERVER['index.php?strona=13'] . '?page=' . $prev;
$nextLink = $_SERVER['index.php?strona=13'] . '?page=' . $next;


///..................numery stron
			for($i=0; $i<$max; $i++)
			{
		
				$y=$i+1;
				//$start_tmp=$i*$perPage;
				$start_tmp=$i+1;
				echo " <a href=index.php?strona=13&page=$start_tmp>$y</a>";
				if(($i!=$max)-1)
				echo" |";
			}
				?>			