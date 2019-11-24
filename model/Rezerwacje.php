<?php
require_once 'Bilet.php';
require_once 'Sala.php';
require_once 'Repertuar.php';
class Rezerwacje extends Walidacja{
    var $Repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczenSenior;
    var $iloscStudent;

    public function __construct($imie, $nazwisko, $miejsca, $iloscUczenSenior, $iloscStudent){
        walidacjaString($imie);
        walidacjaString($nazwisko);
        walidacjaInt($miejsca);
        walidacjaInt($iloscUczenSenior);
        walidacjaInt($iloscStudent);
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
        $cena += $bilet->cenyBiletow[$dzien] * ($this->miejsca-$this->iloscUczenSenior-$this->iloscStudent);
        $cena += $bilet->cenyBiletow[$dzien] / $bilet->ulgaSzkolna * $this->iloscUczenSenior;
        $cena += $bilet->cenyBiletow[$dzien] / $bilet->ulgaStudencka * $this->iloscStudent;
        return $cena;
    }
}
?>