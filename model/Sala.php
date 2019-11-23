<?php
class Sala{
    var $miejsca;

    public function __construct($miejsca){
        $this->miejsca = $miejsca;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>