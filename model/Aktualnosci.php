<?php
require_once 'Walidacja.php';
class Aktualnosci extends Walidacja{
    var $wiadomosci;

    public function __construct($wiadomosci){
        Walidacja::walidacjaString($wiadomosci);
        $this->wiadomosci = $wiadomosci;
    }

    public function __destruct(){
        echo "obiekt został usunięty";
    }
}
?>