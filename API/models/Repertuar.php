<?php
    class Repertuar{
        //baza
        private $conn;
        private $table = 'repertuar';

        //wlasciwosci repertuaru
        public $id_repertuaru;
        public $id_filmu;
        public $id_saliFKRep;
        public $data;

        public function __construct($db){
            $this->conn = $db;
        }

        //funkcje z SQL...

        public function getRepertuarAll(){
            $query = 'SELECT id_repertuaru, id_filmu, id_sali, data FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getRepertuarById(){
            $query = 'SELECT id_repertuaru, id_filmu, id_sali, data FROM ' . $this->table . ' WHERE id_repertuaru = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id_repertuaru);
            try{
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $this->id_repertuaru = $row['id_repertuaru'];
                $this->id_filmu = $row['id_filmu'];
                $this->id_saliFKRep = $row['id_sali'];
                $this->data = $row['data'];
                return TRUE;
            }catch(Exception $e){
                echo $e->getMessage();
                return FALSE;
            }
        }

        public function deleteRepertuarById(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id_repertuaru = ' . $this->id_repertuaru;
            
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
                id_repertuaru = :id_repertuaru,
                id_filmu = :id_filmu,
                id_sali = :id_sali,
                data = :data;
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id_repertuaru = htmlspecialchars(strip_tags($this->id_repertuaru));
            $this->id_filmu = htmlspecialchars(strip_tags($this->id_filmu));
            $this->id_saliFKRep = htmlspecialchars(strip_tags($this->id_saliFKRep));
            $this->data = htmlspecialchars(strip_tags($this->data));

            $stmt->bindParam(':id_repertuaru', $this->id_repertuaru);
            $stmt->bindParam(':id_filmu', $this->id_filmu);
            $stmt->bindParam(':id_sali', $this->id_saliFKRep);
            $stmt->bindParam(':data', $this->data);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }