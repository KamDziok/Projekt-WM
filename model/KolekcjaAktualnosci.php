<?php
class KolekcjaAktualnosci{
    var $TablicaAktualnosci;
    public function __construct(){
        $this->TablicaAktualnosci = array();
    }

    function dodaj($aktualnosci){
        $this->TablicaAktualnosci[] = $aktualnosci;
    }

    function usun($aktualnosci){
        $n = 0;
        while($this->TablicaAktualnosci.count >= $n){
            if($this->TablicaAktualnosci[n] == $aktualnosci){
                $this->TablicaAktualnosci[n].delete;
                break;
            }
        }
    }
}
?>