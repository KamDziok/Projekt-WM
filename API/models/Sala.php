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
            $query = 'SELECT id_sali, numer_sali , liczba_miejsc FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getSalaById(){
            $query = 'SELECT id_sali, numer_sali , liczba_miejsc FROM ' . $this->table . ' WHERE id_sali = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id_sali);
            try{
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->id_sali = $row['id_sali'];
                $this->numer_sali = $row['numer_sali'];
                $this->liczba_miejsc = $row['liczba_miejsc'];
                return TRUE;
            }catch(Exception $e){
                return FALSE;
            }
        }

        public function deleteSalaById(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id_sali = ' . $this->id_sali;
            
            try{
                if($this->conn->query($query) == TRUE){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }catch(Exception $e){
                return FALSE;
            }   
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
            numer_sali = :id_sali,
            liczba_miejsc = :liczba_miejsc;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->numer_sali = htmlspecialchars(strip_tags($this->numer_sali));
            $this->liczba_miejsc = htmlspecialchars(strip_tags($this->liczba_miejsc));

            $stmt->bindParam(':liczba_miejsc', $this->liczba_miejsc);
            $stmt->bindParam(':id_sali', $this->numer_sali);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }