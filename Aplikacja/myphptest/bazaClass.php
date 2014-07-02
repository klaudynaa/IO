<?php

class bazaInfoDane{
	public $id;
	public $nazwa;
	public $rezyser;
	public $dostepnosc;
	public $produkcja;
	public $dystrybutor;
	public $kod;

	public function wyswietlZawartosc()
	{
	echo '<tr>';
	echo '<td width="60px"> <a href="index.php?strona=9&id='.$this->id.'">Usuń</a></td>';
	echo '<td width="50px">'.$this->id.'</td>';
	echo '<td width="100px">'.$this->nazwa.'</td>';
	echo '<td width="100px">'.$this->rezyser.'</td>';
	echo '<td width="150px">'.$this->produkcja.'</td>';
	echo '<td width="100px">'.$this->dostepnosc.'</td>';
	echo '<td width="180px">'.$this->dystrybutor.'</td>';
	echo '<td width="100px">'.$this->kod.'</td>';
	echo '</tr>';
	}
	
}

?>