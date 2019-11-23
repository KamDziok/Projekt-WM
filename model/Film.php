<?php
class Film{
    var $tytul;
    var $reżyser;
    var $opis;

    function __construct($tytul, $reżyser, $opis){
        $this->tytul = $tytul;
        $this->reżyser = $reżyser;
        $this->opis = $opis;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>