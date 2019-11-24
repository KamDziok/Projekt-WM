<?php
class Aktualnosci{
    var $wiadomości;

    public function __construct($wiadomości){
        $this->wiadomości = $wiadomości;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>