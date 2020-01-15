<?php
include_once 'GenerujBilet.php';
class Bilet extends Rezerwacje{
    var $bilet;

    public function __construct($repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent,$idRepertuar){    //konstruktor uzywany jesli kupujemy 
        parent::__construct($repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent, $idRepertuar);       //bilet u pani w "okienku"
        $sala = $repertuar->getSala();
        $film = $repertuar->getFilm();
        $this->bilet = new GenerujBilet($imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent, $sala, $film);
    }

    public function __construct1($rezerwacja){  //konstruktor uzywany jesli potwierdzamy rezerwacje u pani w "okienku"
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

    function zmienStatus(){ //funkcja wysyła "sygnał" zeby zmienic stan pola bilet w tabeli rezerwacje na true
        
        $stan[] = $this->bilet;
        $rekord = json_encode($stan);

        //wysłanie danych na podstawie, których można odnalezć rekord w bazie

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