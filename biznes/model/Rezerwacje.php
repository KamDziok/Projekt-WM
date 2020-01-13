<?php
// include_once 'Ceny.php';
include_once 'Walidacja.php';
class Rezerwacje{
    var $Repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczen;
    var $iloscStudent;

    public function __construct($Repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent, $idRepertuar){
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
        $this->rezerwuj($idRepertuar, $miejsca);
    }

    public function __destruct(){
        
    }

    function getImie(){
        return $this->imie;
    }
    function getNazwisko(){
        return $this->nazwisko;
    }
    function getMiejca(){
        return $this->miejsca;
    }
    function getSzkolny(){
        return $this->iloscUczen;
    }
    function getStudencki(){
        return $this->iloscStudent;
    }

    function setUlgi($iloscUczen, $iloscStudent){
        $this->iloscUczen = $iloscUczen;
        $this->iloscStudent = $iloscStudent;
    }

    function rezerwuj($idRepertuar, $miejsca){
        $plik = fopen("miejsca.json", 'r');
        $rezerwacje = json_decode(fread($plik, filesize($plik)));
        fclose($plik);
        if(flock($plik, LOCK_EX)){
            $plik = fopen("miejsca.json", 'a');
            $miejsca[] = 0;
            foreach($rezerwacje as $r => $dane){
                if($dane[0] == $idRepertuar)
                    for($i = 0; $i < sizeof($miejsca) - 1; $i++){
                        for($j = 0; $j < sizeof($dane, 1) - 3; $j++){
                            if($miejsca[$i] == $dane[2][$j]){
                                return -1;
                            }
                        }
                    }
            }
            $rekord = json_encode(array($idRepertuar, $miejsca));
            if($r != 0) $rekord = "," . $rekord;
            fwrite($plik - 1, $rekord);
            fclose($plik);
            flock($plik, LOCK_UN);
            return $r;
        }else return -1;
    }

    function obliczCene($dzien){
        $cena = 0.00;
        $bilet = Ceny::getCeny();
        $ulgaSzkolna = Ceny::getSzkolne();
        $ulgaStudencka = Ceny::getStudenckie();
        $cena += $bilet[$dzien] * (count($this->miejsca)-$this->iloscUczen-$this->iloscStudent);
        $cena += $bilet[$dzien] / $ulgaSzkolna * $this->iloscUczen;
        $cena += $bilet[$dzien] / $ulgaStudencka * $this->iloscStudent;
        return round($cena,2);
    }

    function potwierdz($id){
        if($id < 0) return false;
        $plik = fopen("miejsca.json", 'r');
        $rezerwacje = json_decode(fread($plik, filesize($plik)));
        fclose($plik);
        if(flock($plik, LOCK_EX)){
            $plik = fopen("miejsca.json", 'w');
            foreach($rezerwacje as $r => $dane){
                if($id == $r) $dane[1][sizeof($dane, 1) - 3] = 1;
            }
            $rekord = json_encode($rezerwacje);
            fwrite($plik, $rekord);
            fclose($plik);
            flock($plik, LOCK_UN);

            // tu powinno byc wyslanie do bazy

            return true;
        }else return false;
    }

    function anuluj($id){
        if($id < 0) return false;
        $plik = fopen("miejsca.json", 'r');
        $rezerwacje = json_decode(fread($plik, filesize($plik)));
        fclose($plik);
        if(flock($plik, LOCK_EX)){
            $plik = fopen("miejsca.json", 'w');
            foreach($rezerwacje as $r => $dane){
                if($id == $r) $dane[0] = -1;
            }
            $rekord = json_encode($rezerwacje);
            fwrite($plik, $rekord);
            fclose($plik);
            flock($plik, LOCK_UN);
            return true;
        }else return false;
    }
}
?>