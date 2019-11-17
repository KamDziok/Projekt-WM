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
}
?>