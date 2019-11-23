<?php
class Repertuar extends KolekcjaRepertuar{
    var $film;
    var $rok;
    var $miasiac;
    var $dzien;
    var $godzina;
    var $sala;

    public function __construct($film, $data, $godzina, $sala){
        $this->film = $film;
        $this->data = $data;
        $this->godzina = $godzina;
        $this->sala = $sala;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>