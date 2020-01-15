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

        public function readSingle(){
            $query = 'SELECT id, login, password FROM ' . $this->table . ' WHERE id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['user_id'];
            $this->login = $row['nick'];
            $this->password = $row['haslo'];
        }

        public function deleteUserById(){
            'DELETE FROM ' . $this->table . ' WHERE id = ?';
            
            $stmt = $this->conn->prepare($query);
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
                id = :id,
                login = :login,
                password = :password;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->login = htmlspecialchars(strip_tags($this->login));
            $this->password = htmlspecialchars(strip_tags($this->password));

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':login', $this->login);
            $stmt->bindParam(':password', $this->password);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }
