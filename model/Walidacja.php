<?php
abstract class Walidacja{

    function walidacjaString($argument){
        if(!is_string($argument)){
            throw new Exception('argument nie jest typu String');
        }
        elseif(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
    }

    function walidacjaInt($argument){
        if(!is_int($argument)){
            throw new Exception('argument nie jest typu int');
        }
        elseif ($argument < 1){
            throw new Exception('argument jest mniejszy od 1');
        }
        elseif(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
    }
    
    function walidacjaFloat($argument){
        if(!is_float($argument)){
            throw new Exception('argument nie jest typu float');
        }
        elseif ($argument < 0){
            throw new Exception('argument jest mniejszy od 0');
        }
        elseif(is_null($argument)){
            throw new Exception('argument nie został podany');
        }
    }

    function walidacjaTablicyFloat($argument){
        $n = 0;
        while($argument.count >= $n){
            if(!is_float($argument[$n])){
                throw new Exception('argument nie jest typu float');
            }
            elseif ($argument < 0){
                throw new Exception('argument jest mniejszy od 0');
            }
            $n++;
        }
    }
    function walidacjaTablicyInt($argument){
        $n = 0;
        while($argument.count >= $n){
            if(!is_int($argument[$n])){
                throw new Exception('argument nie jest typu float');
            }
            elseif ($argument < 0){
                throw new Exception('argument jest mniejszy od 0');
            }
            $n++;
        }
    }
}
?>