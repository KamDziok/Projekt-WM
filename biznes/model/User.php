<?php

require_once 'Walidacja.php';
class User extends Walidacja{
    var $id;
    var $imie;
    var $nazwisko;
    var $login;
    var $email;
    var $haslo;
    var $admin;

    public function __construct($imie, $nazwisko, $login, $email){
        Walidacja::walidacjaString($imie);
        Walidacja::walidacjaString($nazwisko);
        Walidacja::walidacjaString($login);
        Walidacja::walidacjaString($email);
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->login = $login;
        $this->email = $email;
        $this->admin = 0;
    }

    public function __destruct(){
        
    }

    public function setAdmin($admin){
        Walidacja::walidacjaInt($admin);
        $this->amin = $admin;
    }

    public function getAdmin(){
        return $this->admin;
    }

    public function setPassword($haslo){
        $this->haslo = $haslo;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
}