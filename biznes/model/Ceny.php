<?php
include_once 'Walidacja.php';

class Ceny{
    var $cenyBiletow;
    var $ulgaSzkolna;
    var $ulgaStudencka;

    public function __construct(){
        $ceny = json_decode(file_get_contents("ceny.json"));
        $this->ulgaSzkolna = $ceny[0];
        $this->ulgaStudencka = $ceny[1];
        $this->cenyBiletow = $ceny[2];
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

    function zmienCeny($ulgaSzkolna, $ulgaStudencka, $cenyBiletow){
        $ceny = [$ulgaSzkolna, $ulgaStudencka, $cenyBiletow];
        $ceny = json_encode($ceny);
        file_put_contents("ceny.json", $ceny);
    }
}
?>