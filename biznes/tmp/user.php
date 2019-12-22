<?php
    class User{
        private static $licznik = 1;
        public $id;
        public $login;
        public $password;

        public function __construct($imie, $haslo){
            $this->login = $imie;
            $this->password = $haslo;
            $this->id = User::$licznik;
            User::$licznik++;
        }
    }   