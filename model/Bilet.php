<?php
include_once 'Walidacja.php';

class Bilet extends Walidacja{
    var $cenyBiletow;
    var $ulgaSzkolna;
    var $ulgaStudencka;

    public function __construct($cenyBiletow, $ulgaSzkolna, $ulgaStudencka){
        Walidacja::walidacjaTablicaBilety($cenyBiletow);
        Walidacja::walidacjaUlga($ulgaSzkolna);
        Walidacja::walidacjaUlga($ulgaStudencka);
        $this->cenyBiletow = $cenyBiletow;
        $this->ulgaSzkolna = $ulgaSzkolna;
        $this->ulgaStudencka = $ulgaStudencka;
    }

    public function __destruct(){
        
    }

    function zmianaCen($cenyBiletow){
        Walidacja::walidacjaTablicaBilety($cenyBiletow);
        return new Bilet($cenyBiletow, $this->ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgi($ulgaSzkolna, $ulgaStudencka){
        Walidacja::walidacjaUlga($ulgaSzkolna);
        Walidacja::walidacjaUlga($ulgaStudencka);
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $ulgaStudencka);
    }

    function zmianaUlgiSzkolnej($ulgaSzkolna){
        Walidacja::walidacjaUlga($ulgaSzkolna);
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgiStudenckiej($ulgaStudencka){
        Walidacja::walidacjaUlga($ulgaStudencka);
        return new Bilet($this->cenyBiletow, $this->ulgaSzkolna, $ulgaStudencka);
    }
}
?>