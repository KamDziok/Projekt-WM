<?php
    class User{
        //baza
        private $conn;
        private $table = 'uzytkownicy';

        //wlasciwosci uzytkownikow
        public $id;
        public $login;
        public $password;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT id, login, password FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }
    }
