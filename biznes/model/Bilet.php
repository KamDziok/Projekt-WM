<?php
include_once 'GenerujBilet.php';
class Bilet extends Rezerwacje{
    var $bilet;

    public function __construct($repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent,$idRepertuar){
        parent::__construct($repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent, $idRepertuar);
        $sala = $repertuar->getSala();
        $film = $repertuar->getFilm();
        $this->bilet = new GenerujBilet($imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent, $sala, $film);
    }

    public function __construct1($rezerwacja){
        $repertuar = $rezerwacja->getRepertuar();
        $sala = $repertuar->getSala();
        $film = $repertuar->getFilm();
        $this->bilet = new GenerujBilet(
            $rezerwacja->getImie(), $rezerwacja->getNazwisko(), $rezerwacja->getMiejca(), $rezerwacja->getSzkolny(), 
            $rezerwacja->getStudencki(), $sala, $film);
        $this->zmienStatus();
    }

    public function __destruct(){
        
    }

    function zmienStatus(){
        
        // zapytanie do bazy o zmiane stanu

    }

    function drukujBilet(){
        $this->bilet->AliasNbPages();
        $this->bilet->AddPage('L','A4',0);
        $this->bilet->headerTable();
        $this->bilet->mainTable();
        $this->bilet->Output();
    }
}
?>