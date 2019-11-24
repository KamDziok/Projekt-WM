<?php
class KolekcjaFilm extends Film{
    var $TablicaFilm;
    public function __construct(){
        $this->TablicaFilm = array();
    }

    function dodaj($film){
        $this->TablicaFilm[] = $film;
    }

    function usun($film){
        $n = 0;
        while($this->TablicaFilm.count >= $n){
            if($this->TablicaFilm[n] == $film){
                $this->TablicaFilm[n].delete;
                break;
            }
        }
    }
}
?>