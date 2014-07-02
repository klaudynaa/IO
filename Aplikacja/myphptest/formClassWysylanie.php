<?php

class wysylanie{
				public $idfilmu;
				public $nazwaa; 
				public $rezyser; 
				public $produkcja; 
				public $dystrybutor;
				public $kod; 
				public $dostepnosc; 
				
				public function _construct( $nazwaa2, $rezyser2, $produkcja2, $dystrybutor2, $kod2, $dostepnosc2 ){ //2
        $this->nazwaa = $nazwaa2;
        $this->rezyser = $rezyser2; 
		$this->produkcja = $produkcja2;
        $this->dystrybutor = $dystrybutor2; 	
		$this->kod = $kod2;
        $this->dostepnosc = $dostepnosc2; 	
				}
				
				public function nadajPonownie( $nazwaa2, $rezyser2, $produkcja2, $dystrybutor2, $kod2, $dostepnosc2 ){ //2
        $this->nazwaa = $nazwaa2;
        $this->rezyser = $rezyser2; 
		$this->produkcja = $produkcja2;
        $this->dystrybutor = $dystrybutor2; 	
		$this->kod = $kod2;
        $this->dostepnosc = $dostepnosc2; 	
				}
				
				public function wyswietlPosta($wyswietlane, $postowane){
				 echo('<br/>');
                echo ("$wyswietlane: ");
                echo ($_POST[$postowane]);
				}
}

?>