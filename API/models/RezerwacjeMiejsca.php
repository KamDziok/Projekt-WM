<?php

class RezerwacjeMiejsca{
    //baza
    private $conn;
    private $table = 'sala';

    public $id_miejscaFHRezMie;
    public $id_rezerwacjiFKRezMie;

    public function __construct($db){
        $this->conn = $db;
    }

    //funkcje z SQL...
}