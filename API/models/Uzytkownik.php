<?php
    class Uzytkownik{
        //baza
        private $conn;
        private $table = 'uzytkownicy';

        //wlasciwosci uzytkownikow
        public $id_uzytkownika;
        public $login;
        public $password;
        public $admin;
        public $email;
        public $imie;
        public $nazwisko;

        public function __construct($db){
            $this->conn = $db;
        }

        //funkcje z SQL...
    }