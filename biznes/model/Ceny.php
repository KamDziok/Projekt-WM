<?php
include_once 'Walidacja.php';

class Ceny{
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

    public function getCeny(){
        return $this->cenyBiletow;
    }

    public function getSzkolne(){
        return $this->ulgaSzkolna;
    }

    public function getStudenckie(){
        return $this->ulgaStudencka;
    }

    function zmianaCen($cenyBiletow){
        Walidacja::walidacjaTablicaBilety($cenyBiletow);
        return new Ceny($cenyBiletow, $this->ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgi($ulgaSzkolna, $ulgaStudencka){
        Walidacja::walidacjaUlga($ulgaSzkolna);
        Walidacja::walidacjaUlga($ulgaStudencka);
        return new Ceny($this->cenyBiletow, $ulgaSzkolna, $ulgaStudencka);
    }

    function zmianaUlgiSzkolnej($ulgaSzkolna){
        Walidacja::walidacjaUlga($ulgaSzkolna);
        return new Ceny($this->cenyBiletow, $ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgiStudenckiej($ulgaStudencka){
        Walidacja::walidacjaUlga($ulgaStudencka);
        return new Ceny($this->cenyBiletow, $this->ulgaSzkolna, $ulgaStudencka);
    }
}
?>