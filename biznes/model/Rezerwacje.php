<?php
// include_once 'Walidacja.php';

// use ___PHPSTORM_HELPERS\object;

include_once 'Walidacja.php';
class Rezerwacje{
    var $Repertuar;
    var $imie;
    var $nazwisko;
    var $miejsca;

    public function __construct($Repertuar,$imie, $nazwisko, $miejsca, $idRepertuar, $idUzytkownika){   //obiekt jest tworzony przed 
        Walidacja::walidacjaString($imie);                                                              //podaniem rodzaju biletu
        Walidacja::walidacjaString($nazwisko);
        Walidacja::walidacjaTablicyInt($miejsca);
        Walidacja::walidacjaUlgi($miejsca, 0, 0);
        $this->Repertuar = $Repertuar;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->miejsca = $miejsca;
        $this->rezerwuj($idRepertuar, $miejsca, $idUzytkownika);
    }

    public function __destruct(){
        
    }

    function getRepertuar(){
        return $this->Repertuar;
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

    static function rezerwuj($idRepertuar, $miejsca, $idUzytkownika){   //funkcja jesli ma dostep do pliku i podane miejsca nie są zajete 
        $plik = fopen("miejsca.json", 'r');                             //zapisuje dane do pliku z stanem 0 czyli wstepnie zajete
        $rezerwacje = json_decode(fread($plik, filesize("miejsca.json")));
        fclose($plik);
        $k = 0;
        while($k > 2){
            if(flock($plik, LOCK_EX)){
                $plik = fopen("miejsca.json", 'a');
                $miejsca[] = 0;
                foreach($rezerwacje as $r => $dane){
                    if($dane[0] == $idRepertuar)
                        for($i = 0; $i < sizeof($miejsca) - 1; $i++){
                            for($j = 0; $j < sizeof($dane, 1) - 3; $j++){
                                if($miejsca[$i] == $dane[2][$j]){
                                    $k = 3;
                                }
                            }
                        }
                }
                $rekord = json_encode(array($idRepertuar, $miejsca));
                if($r != 0) $rekord = "," . $rekord;
                fwrite($plik, $rekord);
                fclose($plik);
                flock($plik, LOCK_UN);

                $dane[] = $idRepertuar;
                $dane[] = $idUzytkownika;
                $dane[] = $r;   //bedzie potrzebne do wywolania funkcji potwierdz
                $dane[] = $miejsca;
                
                //$dane do wyslania
                //wyslanie potwierdzenia do frontu o powodzeniu zapisu i przejscie do podsumowania
                //jesli front nie bierze danych o zajetych miejscach z tego pliku do wylanie danych do tego miejsca z kad je bierze

            }else{
                sleep(1);
            }
            $k ++;
        }

        $dane[] = "niepowodzenie";  //czy coś

        //wyslanie informacji o niepowodzeniu i pozostanie na ostatniej stronie (wybieranie miejsc)
        //wazne aby dane sie zaktualizowaly bo moze juz ktos zaja jakies miejsca

    }

    function obliczCene($dzien){    //funkcja podaje cene rezerwacji przy podsumowaniu
        $cena = 0.00;               //wymagana zmiana
        $bilet = Ceny::getCeny();   //???
        $ulgaSzkolna = Ceny::getSzkolne();  //???
        $ulgaStudencka = Ceny::getStudenckie(); ///???
        $cena += $bilet[$dzien] * (count($this->miejsca)-$this->iloscUczen-$this->iloscStudent);
        $cena += $bilet[$dzien] / $ulgaSzkolna * $this->iloscUczen;
        $cena += $bilet[$dzien] / $ulgaStudencka * $this->iloscStudent;
        return round($cena,2);
    }

    function potwierdz($id){    //funkcja zmienia stan z 0 na 1 czyli zarezerwowane
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

            $dane[] = "powodzenie";

            //wysyla potwierdzenie udanej transakcji. Przekierowywuje do strony glownej?

        }else{
            $dane[] = "niepowodzenie";
            $dane[] = $id;  //bedzie potrzebne do wywolania funkcji potwierdz kolejny raz

            //wysyla powiadomienie o nieudanej probie uzytkownik moze sprobowac jeszcze raz

         }
    }

    function anuluj($id, $idRezarwacji){           //funkcja nadaje idRepertuaru na -1 co skutkuje
        if($id < 0) return false;   //nie braniem tego rekordu pod uwage w przyszlosci
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
            
            $dane[] = $idRezarwacji;    //chyba wiecej nie trzeba
            
            //wysyla informacje o anulowaniu i usuwa z bazy dane tej rezerwacji

        }else{
            $dane[] = "niepowodzenie";
            $dane[] = $id;  //bedzie potrzebne do wywolania funkcji anuluj kolejny raz

            //wysyla powiadomienie o nieudanej probie uzytkownik moze sprobowac jeszcze raz

         }
    }
}
?>