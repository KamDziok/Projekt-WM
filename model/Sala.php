<?php
class Sala extends Walidacja{
    var $miejsca;

    public function __construct($miejsca){
        Walidacja::walidacjaTablicyInt($miejsca);
        $this->miejsca = $miejsca;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>