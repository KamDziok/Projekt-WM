<?php
abstract class Walidacja{

    public function walidacjaString($argument){
        if(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
        elseif(!is_string($argument)){
            throw new Exception('argument nie jest typu String');
        }
    }

    public function walidacjaInt($argument){
        if(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
        elseif(!is_int($argument)){
            throw new Exception('argument nie jest typu int');
        }
        elseif ($argument < 0){
            throw new Exception('argument jest mniejszy od 0');
        }

    }
    
    public function walidacjaFloat($argument){
        if(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
        elseif(!is_float($argument)){
            throw new Exception('argument nie jest typu float');
        }
        elseif ($argument < 0){
            throw new Exception('argument jest mniejszy od 0');
        }
        
    }

    public function walidacjaTablicyFloat($argument){
        $n = 0;
        try{
            count($argument);
        }catch(Exception $e){
            throw new Exception('argument nie jest typu array');
        }
        while(count($argument) > $n){
            if(!is_float($argument[$n])){
                throw new Exception('argument nie jest typu float');
            }
            elseif ($argument[$n] < 0){
                throw new Exception('argument jest mniejszy od 0');
            }
            $n++;
        }
    }

    public function walidacjaTablicyInt($argument){
        $n = 0;
        try{
            count($argument);
        }catch(Exception $e){
            throw new Exception('argument nie jest typu array');
        }
        while(count($argument) > $n){
            if(!is_int($argument[$n])){
                throw new Exception('argument nie jest typu int');
            }
            elseif ($argument[$n] < 0){
                throw new Exception('argument jest mniejszy od 0');
            }
            $n++;
        }
    }

    public function walidacjaData($godzina, $minuta, $miesiac, $dzien, $rok){
        if( !(
            checkdate($miesiac, $dzien, $rok) &&
            ($godzina < 24) &&
            ($minuta < 60)
            )
        ){
            throw new Exception('argument nie jest data');
        }
    }

    public function walidacjaUlga($argument){
        if(!is_float($argument)){
            throw new Exception('argument nie jest typu float');
        }
        elseif ($argument < 0){
            throw new Exception('argument jest mniejszy od 0');
        }
        elseif ($argument > 1){
            throw new Exception('argument jest wiekszy od 1');
        }
    }

    public function walidacjaTablicaBilety($argument){
        $this->walidacjaTablicyFloat($argument);
        if(count($argument) != 7){
            throw new Exception('tablica nie ma 7 elemwntow');
        }
    }

    public function walidacjaUlgi($miejsca, $u1, $u2){
        if(count($miejsca) < $u1 + $u2){
            throw new Exception('niewłaściwa liczba biletów ulgowych');
        }
    }
}
?>