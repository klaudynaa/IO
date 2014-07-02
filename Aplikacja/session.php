<?php
if(!isset($_SESSION['Pracownicy']))
{ 
 $_SESSION['Pracownicy'] .= " ";
}
else
{ 
 echo $_SESSION['Pracownicy'];
}
	?>