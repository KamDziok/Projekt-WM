<?php
    class RezerwacjeMiejsca{
        //baza
        private $conn;
        private $table = 'rezerwacje_miejsca';

        //wlasciwosci rezerwacji miejsca
        public $id_miejscaFHRezMie;
        public $id_rezerwacjiFKRezMie;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getRezerwackeMiejscaAll(){
            $query = 'SELECT id_rezerwacji, id_miejsca FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getRezerwacjaMiejscaById(){
            $query = 'SELECT id_rezerwacji, id_miejsca FROM ' . $this->table . ' WHERE id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id_miejscaFHRezMie = $row['id_rezerwacji'];
            $this->id_rezerwacjiFKRezMie = $row['id_miejsca'];
        }

        public function deleteRezerwacjeMiejscaById(){
            'DELETE FROM ' . $this->table . ' WHERE id = ?';
            
            $stmt = $this->conn->prepare($query);
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
            id_rezerwacji = :id_miejscaFHRezMie,
            id_miejsca = :id_rezerwacjiFKRezMie;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id_miejscaFHRezMie = htmlspecialchars(strip_tags($this->id_miejscaFHRezMie));
            $this->id_rezerwacjiFKRezMie = htmlspecialchars(strip_tags($this->id_rezerwacjiFKRezMie));

            $stmt->bindParam(':id_miejscaFHRezMie', $this->id_miejscaFHRezMie);
            $stmt->bindParam(':id_rezerwacjiFKRezMie', $this->id_rezerwacjiFKRezMie);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }
