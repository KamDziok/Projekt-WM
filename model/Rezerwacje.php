<?php

class Rezerwacje{

    var $cenaPodstawowaBiletu;
    var $iloscNormalnych;
    var $iloscUczenSenior;
    var $iloscStudent;

    function __construct($cenaPodstawowaBiletu, $iloscNormalnych, $iloscUczenSenior, $iloscStudent){
        $this->cenaPodstawowaBiletu = $cenaPodstawowaBiletu;
        $this->iloscNormalnych = $iloscNormalnych;
        $this->iloscUczenSenior = $iloscUczenSenior;
        $this->iloscStudent = $iloscStudent;
    }


    function cena(){
        $cena = 0.00;
        $cena += $this->cenaPodstawowaBiletu * $this->iloscNormalnych;
        $cena += $this->cenaPodstawowaBiletu * 0.7 * $this->iloscUczenSenior;
        $cena += $this->cenaPodstawowaBiletu * 0.5 * $this->iloscStudent;
        return round($cena, 2);
    }

}