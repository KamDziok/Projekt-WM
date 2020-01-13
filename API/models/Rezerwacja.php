<?php

class Rezerwacja{
    //baza
    private $conn;
    private $table = 'sala';

    public $id_rezerwacji;
    public $bilet;
    public $id_uzytkownikaFKRez;
    public $iloscUczen;
    public $iloscStudent;
    public $id_repertuaruFKRez;

    public function __construct($db){
        $this->conn = $db;
    }

    //funkcje z SQL...
}