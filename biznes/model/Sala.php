<?php
class Sala{
    var $miejsca;

    public function __construct($miejsca){
        Walidacja::walidacjaTablicyInt($miejsca);
        $this->miejsca = $miejsca;
    }

    public function __destruct(){
        
    }

    function getMiejsca(){
        return $this->miejsca;
    }
}
?>