<?php
class Repertuar{
    var $film;
    var $data;
    var $godzina;
    var $sala;

    function __construct($film, $data, $godzina, $sala){
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