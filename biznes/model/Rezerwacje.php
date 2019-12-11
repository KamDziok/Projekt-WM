<?php
include_once 'Bilet.php';
include_once 'Sala.php';
include_once 'Repertuar.php';
include_once 'Walidacja.php';
class Rezerwacje extends Walidacja{
    var $repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczen;
    var $iloscStudent;

    public function __construct($Repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent){
        Walidacja::walidacjaString($imie);
        Walidacja::walidacjaString($nazwisko);
        Walidacja::walidacjaTablicyInt($miejsca);
        Walidacja::walidacjaInt($iloscUczen);
        Walidacja::walidacjaInt($iloscStudent);
        Walidacja::walidacjaUlgi($miejsca, $iloscUczen, $iloscStudent);
        $this->Repertuar = $Repertuar;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->miejsca = $miejsca;
        $this->iloscUczen = $iloscUczen;
        $this->iloscStudent = $iloscStudent;
    }

    public function __destruct(){
        
    }

    function obliczCene($dzien, $bilet){
        $cena = 0.00;
        $cena += $bilet->cenyBiletow[$dzien] * (count($this->miejsca)-$this->iloscUczen-$this->iloscStudent);
        $cena += $bilet->cenyBiletow[$dzien] / $bilet->ulgaSzkolna * $this->iloscUczen;
        $cena += $bilet->cenyBiletow[$dzien] / $bilet->ulgaStudencka * $this->iloscStudent;
        return round($cena,2);
    }
}
?>