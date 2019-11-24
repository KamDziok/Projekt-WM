<?php
include_once 'Bilet.php';
include_once 'Sala.php';
include_once 'Repertuar.php';
include_once 'Walidacja.php';
class Rezerwacje extends Walidacja{
    var $Repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczenSenior;
    var $iloscStudent;

    public function __construct($imie, $nazwisko, $miejsca, $iloscUczenSenior, $iloscStudent){
        Walidacja::walidacjaString($imie);
        Walidacja::walidacjaString($nazwisko);
        Walidacja::walidacjaTablicyInt($miejsca);
        Walidacja::walidacjaInt($iloscUczenSenior);
        Walidacja::walidacjaInt($iloscStudent);
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->miejsca = $miejsca;
        $this->iloscUczenSenior = $iloscUczenSenior;
        $this->iloscStudent = $iloscStudent;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }

    function obliczCene($dzien, $bilet){
        $cena = 0.00;
        $cena += $bilet->cenyBiletow[$dzien] * (count($this->miejsca)-$this->iloscUczenSenior-$this->iloscStudent);
        $cena += $bilet->cenyBiletow[$dzien] / $bilet->ulgaSzkolna * $this->iloscUczenSenior;
        $cena += $bilet->cenyBiletow[$dzien] / $bilet->ulgaStudencka * $this->iloscStudent;
        return round($cena,2);
    }
}
?>