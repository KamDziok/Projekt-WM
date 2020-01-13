<?php

class Repertuar{
    //baza
    private $conn;
    private $table = 'sala';

    public $id_repertuaru;
    public $film;
    public $id_saliFKRep;
    public $data;

    public function __construct($db){
        $this->conn = $db;
    }

    //funkcje z SQL...
}