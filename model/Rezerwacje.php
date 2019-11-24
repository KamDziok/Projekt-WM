<?php
require_once 'Bilet.php';
require_once 'Sala.php';
require_once 'Repertuar.php';
class Rezerwacje{
    var $Repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczenSenior;
    var $iloscStudent;

    public function __construct($imie, $nazwisko, $miejsca, $iloscUczenSenior, $iloscStudent){
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->miejsca = $miejsca;
        $this->iloscUczenSenior = $iloscUczenSenior;
        $this->iloscStudent = $iloscStudent;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }

    function obliczCene(){
        $cena = 0.00;
        $cena += Bilet->cenyBiletow * count($this->miejsca);
        $cena += Bilet->cenyBiletow / Bilet->ulgaSzkolna * $this->iloscUczenSenior;
        $cena += Bilet->cenyBiletow / Bilet->ulgaStudencka * $this->iloscStudent;
        return $cena;
    }
}
?>