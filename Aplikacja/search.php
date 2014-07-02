<meta content="text/php; charset=utf-8" http-equiv="Content-Type" />
<?php 
	$bd = mysql_connect('mysql.cba.pl', 'klaudynna', 'haslo'); 
	$db = mysql_select_db('klaudynna_cba_pl'); 

	if (!$bd) {
	  exit('<p>Nie mo¿na skontaktowaæ siê ' .
	      'w tej chwili z baza danych.</p>');
	}
	
	if (!mysql_select_db('klaudynna_cba_pl')) {
	  exit('<p>Nie mo¿na zlokalizowaæ ' .
	      'w tej chwili bazy danych.</p>');	
	}
	
	
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
	
	$tmp = $_POST["zapytanie"];
	$query = explode(" ", $tmp);

	$zm = "";
	foreach ($query as $i)
	{
		$tmp1[] = " nazwisko Like '%$i%'";
	}
	$query2 = implode(" OR", $tmp1);
	
	$start = ($page - 1) * $perPage;
	$zapSQL = 'SELECT * FROM Pracownicy ;';
	$zapytSQL = "SELECT * FROM Pracownicy WHERE $query2 ORDER BY id;"; 
	
	$wynik2 = mysql_query($zapytSQL);
	$num2=mysql_num_rows($wynik2); 
	
	$zapytanieSQL = "SELECT * FROM Pracownicy WHERE $query2 ORDER BY id LIMIT $start, $perPage;"; 

	$wynik = mysql_query($zapytanieSQL);
	$num=mysql_num_rows($wynik); 
	
	$wynik1 = mysql_query($zapSQL);
	$num1=mysql_num_rows($wynik1); 
	
	$max=ceil($num1/$perPage);
	$q = mysql_query($zapSQL); 
	
	$_SESSION['liczba_z'] = $num2;
	
	echo '<table border="1">';
	echo '<tr>';
	echo '<td width="50px"> <b> Id </td>';
	echo '<td width="100px"> <b> ImiÄ™ </td>';
	echo '<td width="100px"> <b> Nazwisko </td>';
	echo '<td width="160px"> <b> Nazwisko PanieÅ„skie </td>';
	echo '<td width="100px"> <b> PÅ‚eÄ‡ </td>';
	echo '<td width="180px"> <b> Adres Email </td>';
	echo '<td width="100px"> <b> Kod pocztowy </td>';
	echo '</tr>';
	
	$i = 0;
	
	while ($i < $num)
	{
		$id=mysql_result($wynik,$i,"id"); 
		$imie=mysql_result($wynik,$i,"imie"); 
		$nazwisko=mysql_result($wynik,$i,"nazwisko"); 
		$plec=mysql_result($wynik,$i,"plec"); 
		$naz_pan=mysql_result($wynik,$i,"naz_pan"); 
		$email=mysql_result($wynik,$i,"email"); 
		$kod_p=mysql_result($wynik,$i,"kod_p"); 
		
		echo '<tr>';
		echo '<td width="50px">'.$id.'</td>';
		echo '<td width="100px">'.$imie.'</td>';
		echo '<td width="100px">'.$nazwisko.'</td>';
		echo '<td width="160px">'.$naz_pan.'</td>';
		echo '<td width="100px">'.$plec.'</td>';
		echo '<td width="180px">'.$email.'</td>';
		echo '<td width="100px">'.$kod_p.'</td>';
		echo '</tr>';
		$i++;
	}
	echo '</table>';
	
	
	if($num2 >= $perPage)
	{
	$prev = $page - 1;
	$next = $page + 1;
		
	$prevLink = $_SERVER['index.php?st=5'] . '?page=' . $prev;
	$nextLink = $_SERVER['index.php?st=5'] . '?page=' . $next;
	
	
				for($i=0; $i<$max; $i++)
				{
			
					$y=$i+1;
					$start_tmp=$i+1;
					echo " <a href=index.php?strona=5&page=$start_tmp>$y</a>";
					if(($i!=$max)-1)
					echo" |";
			
				}
	}
?>