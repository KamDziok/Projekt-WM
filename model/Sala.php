<?php
class Sala{
    var $miejsca;

    function __construct($miejsca){
        $this->miejsca = $miejsca;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>