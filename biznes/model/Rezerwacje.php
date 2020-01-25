<?php
include_once 'Walidacja.php';
class Rezerwacje{
    var $Repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczen;
    var $iloscStudent;

    public function __construct($Repertuar,$imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent){ //obiekt jest tworzony przed 
        Walidacja::walidacjaString($imie);                                                          //podaniem rodzaju biletu
        Walidacja::walidacjaString($nazwisko);
        Walidacja::walidacjaTablicyInt($miejsca);
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

    public function getRepertuar(){
        return $this->Repertuar;
    }

    public function getImie(){
        return $this->imie;
    }

    public function getNazwisko(){
        return $this->nazwisko;
    }

    public function getMiejca(){
        return $this->miejsca;
    }

    public function rezerwuj($idRepertuar, $miejsca){                           //funkcja jesli ma dostep do pliku i podane miejsca nie są zajete 
        $rezerwacje = json_decode(file_get_contents("miejsca.json"), TRUE);     //zapisuje dane do pliku z stanem 0 czyli wstepnie zajete
        $miejsca[] = 0;
        $k = 1;
        $r = 0;
        foreach($rezerwacje as $r => $dane){
            if($dane[0] == $idRepertuar){
                for($i = 0; $i < sizeof($miejsca) - 1; $i++){
                    for($j = 0; $j < sizeof($dane, 1) - 3; $j++){
                        if($miejsca[$i] == intval($dane[1][$j])){
                            $k = 0;
                            break;
                        }
                    }
                    if($k == 0) break;
                }
            }
            // $id = $r;
            if($k == 0) break;
        }
        if($k == 1){
            $rezerwacje[] = [$idRepertuar, $miejsca];
            $rezerwacje = json_encode($rezerwacje);
            file_put_contents("miejsca.json", $rezerwacje);
            if(defined('r')) return $r;
            else return 0;
        }else return -1;
    }

    public function obliczCene($cenyBiletow, $dzien){    //funkcja podaje cene rezerwacji przy podsumowaniu
        $cena = 0.00;
        $ulgaSzkolna = $cenyBiletow->getSzkolne();
        $ulgaStudencka = $cenyBiletow->getStudenckie();
        $dni = $cenyBiletow->getCeny();
        $cena += $dni[$dzien] * (count($this->miejsca) - $this->iloscUczen - $this->iloscStudent);
        $cena += $dni[$dzien] / $ulgaSzkolna * $this->iloscUczen;
        $cena += $dni[$dzien] / $ulgaStudencka * $this->iloscStudent;
        return round($cena,2);
    }

    public function potwierdz($id){    //funkcja zmienia stan z 0 na 1 czyli zarezerwowane 
        $rezerwacje = json_decode(file_get_contents("miejsca.json"), TRUE);
        foreach($rezerwacje as $r => $dane){
            if($id == $r) $dane[1][sizeof($dane, 1) - 3] = 1;
        }
        $rezerwacje = json_encode($rezerwacje);
        file_put_contents("miejsca.json", $rezerwacje);

            // wysyla potwierdzenie udanej transakcji. Przekierowywuje do strony glownej? 
            return TRUE;
    }

    public function anuluj($id){                                                //funkcja nadaje idRepertuaru na -1 co skutkuje 
        $rezerwacje = json_decode(file_get_contents("miejsca.json"), TRUE);     //nie braniem tego rekordu pod uwage w przyszlosci
        foreach($rezerwacje as $r => $dane){
            if($id == $r) $dane[0] = -1;
        }
            $rezerwacje = json_encode($rezerwacje);
            file_put_contents("miejsca.json", $rezerwacje);

            return TRUE;
    }
}
?>