<?php
class KolekcjaRezerwacje extends Rezerwacje{
    var $TablicaRezerwacje;
    public function __construct(){
        $this->TablicaRezerwacje = array();
    }

    function dodaj($rezerwacje){
        $this->TablicaRezerwacje[] = $rezerwacje;
    }

    function usun($rezerwacje){
        $n = 0;
        while($this->TablicaRezerwacje.count >= $n){
            if($this->TablicaRezerwacje[n] == $rezerwacje){
                $this->TablicaRezerwacje[n].delete;
                break;
            }
        }
    }
}
?>