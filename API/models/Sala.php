<?php
    class Sala{
        //baza
        private $conn;
        private $table = 'sala';

        //wlasciwosci sali

        public $id_sali;
        public $numer_sali;
        public $liczba_miejsc;

        public function __construct($db){
            $this->conn = $db;
        }

        //funkcje z SQL...

        public function getSalaAll(){
            $query = 'SELECT numer_sali , liczba_miejsc FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getSalaById(){
            $query = 'SELECT numer_sali , liczba_miejsc FROM ' . $this->table . ' WHERE numer_sali = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id_sali);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id_sali = $row['numer_sali'];
            $this->liczba_miejsc = $row['liczba_miejsc'];
        }

        public function deleteSalaById(){
            'DELETE FROM ' . $this->table . ' WHERE numer_sali = ?';
            
            $stmt = $this->conn->prepare($query);
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
            numer_sali = :id_sali,
            liczba_miejsc = :liczba_miejsc;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id_sali = htmlspecialchars(strip_tags($this->id_sali));
            $this->liczba_miejsc = htmlspecialchars(strip_tags($this->liczba_miejsc));

            $stmt->bindParam(':liczba_miejsc', $this->liczba_miejsc);
            $stmt->bindParam(':id_sali', $this->id_sali);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }