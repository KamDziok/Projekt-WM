<?php
    class Repertuar{
        //baza
        private $conn;
        private $table = 'repertuar';

        //wlasciwosci repertuaru
        public $id_repertuaru;
        public $film;
        public $id_saliFKRep;
        public $data;

        public function __construct($db){
            $this->conn = $db;
        }

        //funkcje z SQL...

        public function getRepertuarAll(){
            $query = 'SELECT id_repertuaru, filmu, id_sali, data FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getRepertuarById(){
            $query = 'SELECT id_repertuaru, filmu, id_sali, data FROM ' . $this->table . ' WHERE id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id_repertuaru = $row['id_repertuaru'];
            $this->film = $row['filmu'];
            $this->id_saliFKRep = $row['id_sali'];
            $this->data = $row['data'];
        }
      
        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
                id_repertuaru = :id_repertuaru,
                filmu = :film,
                if_saliFKRep = :id_sali,
                data = :data
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id_repertuaru = htmlspecialchars(strip_tags($this->id_repertuaru));
            $this->filmu = htmlspecialchars(strip_tags($this->filmu));
            $this->id_sali = htmlspecialchars(strip_tags($this->id_sali));
            $this->data = htmlspecialchars(strip_tags($this->data));

            $stmt->bindParam(':id_repertuaru', $this->id_repertuaru);
            $stmt->bindParam(':filmu', $this->filmu);
            $stmt->bindParam(':id_sali', $this->id_sali);
            $stmt->bindParam(':data', $this->data);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }