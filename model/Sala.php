<?php
class Sala extends Walidacja{
    var $miejsca;

    public function __construct($miejsca){
        walidacjaTablicyInt($miejsca);
        $this->miejsca = $miejsca;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>