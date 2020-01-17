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
            $query = 'SELECT user_id, uprawnienia_administracyjne, nick, mail, imie, nazwisko FROM ' . $this->table . ' WHERE user_id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id_uzytkownika);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['user_id'];
            $this->login = $row['nick'];
            $this->$admin = $row['uprawnienia_administracyjne'];
            $this->$email = $row['mail'];
            $this->$imie = $row['imie'];
            $this->$nazwisko = $row['nazwisko'];
        }

        public function deleteUserById(){
            'DELETE FROM ' . $this->table . ' WHERE id = ?';
            
            $stmt = $this->conn->prepare($query);
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
                nick = :login,
                haslo = :password,
                uprawnienia_administracyjne = :admin,
                mail = :email,
                imie = :imie,
                nazwisko = :nazwisko;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            // $this->id = htmlspecialchars(strip_tags($this->id));
            $this->login = htmlspecialchars(strip_tags($this->login));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->admin = htmlspecialchars(strip_tags($this->admin));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->imie = htmlspecialchars(strip_tags($this->imie));
            $this->nazwisko = htmlspecialchars(strip_tags($this->nazwisko));

            // $stmt->bindParam(':id', $this->id);
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

        public function chechUzytkownikExist(){
            $query = 'SELECT user_id, uprawnienia_administracyjne, nick, mail, haslo, imie, nazwisko FROM ' . $this->table . ' WHERE nick = ? AND mail = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->login);
            $stmt->BindParam(2, $this->email);

            $stmt->execute();
            
            if($stmt->rowCount() == 1){

                // $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // $this->id_uzytkownika = $row['user_id'];
                // $this->admin = $row['uprawnienia_administracyjne'];
                // $this->login = $row['nick'];
                // $this->email = $row['mail'];
                // $this->imie = $row['imie'];
                // $this->nazwisko = $row['nazwisko'];
                
                return true;
            }
            return false;
        }
        public function chechUzytkownikExist_no_create(){
            $query = 'SELECT user_id, uprawnienia_administracyjne, nick, mail, haslo, imie, nazwisko FROM ' . $this->table . ' WHERE nick = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->login);

            $stmt->execute();
            
            if($stmt->rowCount() == 1){

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->id_uzytkownika = $row['user_id'];
                $this->admin = $row['uprawnienia_administracyjne'];
                $this->login = $row['nick'];
                $this->email = $row['mail'];
                $this->imie = $row['imie'];
                $this->nazwisko = $row['nazwisko'];
                
                return true;
            }
            return false;
        }
    }