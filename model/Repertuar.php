<?php
class Repertuar extends Walidacja{
    var $film;
    var $rok;
    var $miesiac;
    var $dzien;
    var $godzina;
    var $minuta;
    var $sala;

    public function __construct($film, $rok, $miesiac, $dzien, $godzina, $minuta, $sala){
        Walidacja::walidacjaString($film);
        Walidacja::walidacjaInt($rok);
        Walidacja::walidacjaInt($miesiac);
        Walidacja::walidacjaInt($dzien);
        Walidacja::walidacjaInt($godzina);
        Walidacja::walidacjaInt($minuta);
        Walidacja::walidacjaInt($sala);
        $this->film = $film;
        $this->rok = $rok;
        $this->miesiac = $miesiac;
        $this->dzien = $dzien;
        $this->godzina = $godzina;
        $this->minuta = $minuta;
        $this->sala = $sala;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>