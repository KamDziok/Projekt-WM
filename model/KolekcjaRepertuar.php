<?php
class KolekcjaRepertuar{
    var $TablicaRepertuar;
    public function __construct(){
        $this->TablicaRepertuar = array();
    }

    function dodaj($repertuar){
        $this->TablicaRepertuar[] = $repertuar;
    }

    function usun($repertuar){
        $n = 0;
        while($this->TablicaRepertuar.count >= $n){
            if($this->TablicaRepertuar[n] == $repertuar){
                $this->TablicaRepertuar[n].delete;
                break;
            }
        }
    }
}
?>