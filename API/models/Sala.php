<?php

class Sala{
    //baza
    private $conn;
    private $table = 'sala';

    public $id_sali;
    public $liczba_miejsc;

    public function __construct($db){
        $this->conn = $db;
    }

    //funkcje z SQL...
}