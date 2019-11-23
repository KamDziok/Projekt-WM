<?php
class Bilet{
    var $cenyBiletow;
    var $ulgaSzkolna;
    var $ulgaStudencka;

    function __construct($cenyBiletow, $ulgaSzkolna, $ulgaStudencka){
        $this->cenyBiletow = $cenyBiletow;
        $this->ulgaSzkolna = $ulgaSzkolna;
        $this->ulgaStudencka = $ulgaStudencka;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }

    function zmianaCen($cenyBiletow){
        return new Bilet($cenyBiletow, $this->ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgi($ulgaSzkolna, $ulgaStudencka){
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $ulgaStudencka);
    }

    function zmianaUlgiSzkolnej($ulgaSzkolna){
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgiStudenckiej($ulgaStudencka){
        return new Bilet($this->cenyBiletow, $this->ulgaSzkolna, $ulgaStudencka);
    }
}
?>