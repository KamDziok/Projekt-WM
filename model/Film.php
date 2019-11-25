<?php
class Film extends Walidacja{
    var $tytul;
    var $reżyser;
    var $opis;

    public function __construct($tytul, $reżyser, $opis){
        Walidacja::walidacjaString($tytul);
        Walidacja::walidacjaString($reżyser);
        Walidacja::walidacjaString($opis);
        $this->tytul = $tytul;
        $this->reżyser = $reżyser;
        $this->opis = $opis;
    }

    public function __destruct(){
        
    }
}
?>