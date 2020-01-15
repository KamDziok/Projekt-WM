<?php
    class Uzytkownik{
        //baza
        private $conn;
        private $table = 'user';

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

        public function getUzytkownicyAll(){
            $query = 'SELECT user_id, uprawnienia_administracyjne, nick, mail, haslo, imie, nazwisko FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getUzytkownicyById(){
            $query = 'SELECT user_id, uprawnienia_administracyjne, nick, mail, haslo, imie, nazwisko FROM ' . $this->table . ' WHERE id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['user_id'];
            $this->login = $row['nick'];
            $this->password = $row['haslo'];
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
                user_id = :id,
                nick = :login,
                haslo = :password,
                uprawnienia_administracyjne = :admin,
                mail = :email,
                imie = :imie,
                nazwisko = :nazwisko;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->login = htmlspecialchars(strip_tags($this->login));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->admin = htmlspecialchars(strip_tags($this->admin));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->imie = htmlspecialchars(strip_tags($this->imie));
            $this->nazwisko = htmlspecialchars(strip_tags($this->nazwisko));

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':login', $this->login);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':admin', $this->admin);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':imie', $this->imie);
            $stmt->bindParam(':nazwisko', $this->nazwisko);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }