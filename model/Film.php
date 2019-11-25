<?php
class Film extends Walidacja{
    var $tytul;
    var $rerzyser;
    var $opis;

    public function __construct($tytul, $rerzyser, $opis){
        Walidacja::walidacjaString($tytul);
        Walidacja::walidacjaString($rerzyser);
        Walidacja::walidacjaString($opis);
        $this->tytul = $tytul;
        $this->rerzyser = $rerzyser;
        $this->opis = $opis;
    }

    public function __destruct(){
        
    }
}
?>