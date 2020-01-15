<?php
class Repertuar{
    var $film;
    var $data;
    var $sala;

    public function __construct($film, $godzina, $minuta, $miesiac, $dzien, $rok, $sala){
        Walidacja::walidacjaString($film);
        Walidacja::walidacjaData($godzina, $minuta, $miesiac, $dzien, $rok);
        Walidacja::walidacjaInt($sala);
        $this->film = $film;
        $this->data = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);
        $this->sala = $sala;
    }

    public function __destruct(){
        
    }

    function getName(){
        return $this->film;
    }

    function getDate(){
        return $this->data;
    }

    function getSala(){
        return $this->Sala;
    }

}
?>