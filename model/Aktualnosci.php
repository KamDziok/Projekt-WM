<?php
require_once 'Walidacja.php';
class Aktualnosci extends Walidacja{
    var $wiadomości;

    public function __construct($wiadomości){
        walidacjaString($wiadomości);
        $this->wiadomości = $wiadomości;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>