<?php
abstract class Walidacja{

    protected function walidacjaString($argument){
        if(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
        elseif(!is_string($argument)){
            throw new Exception('argument nie jest typu String');
        }
    }

    protected function walidacjaInt($argument){
        if(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
        elseif(!is_int($argument)){
            throw new Exception('argument nie jest typu int');
        }
        elseif ($argument < 0){
            throw new Exception('argument jest mniejszy od 1');
        }

    }
    
    protected function walidacjaFloat($argument){
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

    protected function walidacjaTablicyFloat($argument){
        $n = 0;
        while(count($argument) > $n){
            if(!is_float($argument[$n])){
                throw new Exception('argument nie jest typu float');
            }
            elseif ($argument < 0){
                throw new Exception('argument jest mniejszy od 0');
            }
            $n++;
        }
    }
    protected function walidacjaTablicyInt($argument){
        $n = 0;
        while(count($argument) > $n){
            if(!is_int($argument[$n])){
                throw new Exception('argument nie jest typu float');
            }
            elseif ($argument < 0){
                throw new Exception('argument jest mniejszy od 0');
            }
            $n++;
        }
    }
    protected function walidacjaData($godzina, $minuta, $miesiac, $dzien, $rok){
        if( !(
            checkdate($miesiac, $dzien, $rok) &&
            ($godzina < 24) &&
            ($minuta < 60)
            )
        ){
            throw new Exception('argument nie jest data');
        }
    }
}
?>