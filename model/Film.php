<?php
class Film extends Walidacja{
    var $tytul;
    var $reżyser;
    var $opis;

    public function __construct($tytul, $reżyser, $opis){
        walidacjaString($tytul);
        walidacjaString($reżyser);
        walidacjaString($opis);
        $this->tytul = $tytul;
        $this->reżyser = $reżyser;
        $this->opis = $opis;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>