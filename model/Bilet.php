<?php
class Bilet extends Walidacja{
    var $cenyBiletow;
    var $ulgaSzkolna;
    var $ulgaStudencka;

    public function __construct($cenyBiletow, $ulgaSzkolna, $ulgaStudencka){
        walidacjaTablicy($cenyBiletow);
        walidacjaFloat($ulgaSzkolna);
        walidacjaFloat($ulgaStudencka);
        $this->cenyBiletow = $cenyBiletow;
        $this->ulgaSzkolna = $ulgaSzkolna;
        $this->ulgaStudencka = $ulgaStudencka;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }

    function zmianaCen($cenyBiletow){
        walidacjaTablicy($cenyBiletow);
        return new Bilet($cenyBiletow, $this->ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgi($ulgaSzkolna, $ulgaStudencka){
        walidacjaFloat($ulgaSzkolna);
        walidacjaFloat($ulgaStudencka);
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $ulgaStudencka);
    }

    function zmianaUlgiSzkolnej($ulgaSzkolna){
        walidacjaFloat($ulgaSzkolna);
        return new Bilet($this->cenyBiletow, $ulgaSzkolna, $this->ulgaStudencka);
    }

    function zmianaUlgiStudenckiej($ulgaStudencka){
        walidacjaFloat($ulgaStudencka);
        return new Bilet($this->cenyBiletow, $this->ulgaSzkolna, $ulgaStudencka);
    }
}
?>