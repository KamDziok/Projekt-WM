<?php
include_once 'Walidacja.php';

class Bilet extends Walidacja{
    var $cenyBiletow;
    var $ulgaSzkolna;
    var $ulgaStudencka;

    public function __construct($cenyBiletow, $ulgaSzkolna, $ulgaStudencka){
        Walidacja::walidacjaTablicyFloat($cenyBiletow);
        Walidacja::walidacjaFloat($ulgaSzkolna);
        Walidacja::walidacjaFloat($ulgaStudencka);
        $this->cenyBiletow = $cenyBiletow;
        $this->ulgaSzkolna = $ulgaSzkolna;
        $this->ulgaStudencka = $ulgaStudencka;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }

    function zmianaCen($cenyBiletow){
        Walidacja::walidacjaTablicy($cenyBiletow);
        return new Bilet($cenyBiletow, $this->ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgi($ulgaSzkolna, $ulgaStudencka){
        Walidacja::walidacjaFloat($ulgaSzkolna);
        Walidacja::walidacjaFloat($ulgaStudencka);
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $ulgaStudencka);
    }

    function zmianaUlgiSzkolnej($ulgaSzkolna){
        Walidacja::walidacjaFloat($ulgaSzkolna);
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgiStudenckiej($ulgaStudencka){
        Walidacja::walidacjaFloat($ulgaStudencka);
        return new Bilet($this->cenyBiletow, $this->ulgaSzkolna, $ulgaStudencka);
    }
}
?>