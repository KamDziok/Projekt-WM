<?php
    class Rezerwacja{
        //baza
        private $conn;
        private $table = 'rezerwacja';

        //wlasciwosci rezerwacji
        public $id_rezerwacji;
        public $bilet;
        public $id_uzytkownikaFKRez;
        public $iloscUczen;
        public $iloscStudent;
        public $id_repertuaruFKRez;
        public $cena;

        public function __construct($db){
            $this->conn = $db;
        }

        //funkcje z SQL...

        public function getRezerwacjaAll(){
            $query = 'SELECT id_rezerwacji, bilet, user_id, ilosc_uczen_senior, ilosc_student, id_repertuaru FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getRezerwacjaById(){
            $query = 'SELECT id_rezerwacji, bilet, user_id, ilosc_uczen_senior, ilosc_student, id_repertuaru FROM ' . $this->table . ' WHERE id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id_rezerwacji);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id_rezerwacji = $row['id_rezerwacji'];
            $this->bilet = $row['bilet'];
            $this->id_uzytkownikaFKRez = $row['user_id'];
            $this->iloscUczen = $row['ilosc_uczen_senior'];
            $this->iloscStudent = $row['ilosc_student'];
            $this->id_repertuaruFKRez = $row['id_repertuaru'];
        }
        
        public function deleteRezerwacjaById(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = ' . $this->id_rezerwacji;
            
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

        private function getIdRezerwacji(){
            $query = 'SELECT id_rezerwacji FROM ' . $this->table . ' WHERE bilet = ' .
            $this->bilet . " AND user_id = " . $this->id_uzytkownikaFKRez . " AND ilosc_uczen_senior = " . $this->iloscUczen .
            " AND ilosc_student = " . $this->iloscStudent . " AND id_repertuaru = " . $this->id_repertuaruFKRez;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            $this->id_rezerwacji = $row['id_rezerwacji'];
        }
        
        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
            bilet = :bilet,
            user_id = :id_uzytkownikaFKRez,
            ilosc_uczen_senior = :iloscUczen,
            ilosc_student = :iloscStudent,
            id_repertuaru = :id_repertuaruFKRez;
            cena = :cena
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->bilet = htmlspecialchars(strip_tags($this->bilet));
            $this->id_uzytkownikaFKRez = htmlspecialchars(strip_tags($this->id_uzytkownikaFKRez));
            $this->iloscUczen = htmlspecialchars(strip_tags($this->iloscUczen));
            $this->iloscStudent = htmlspecialchars(strip_tags($this->iloscStudent));
            $this->id_repertuaruFKRez = htmlspecialchars(strip_tags($this->id_repertuaruFKRez));

            $stmt->bindParam(':bilet', $this->bilet);
            $stmt->bindParam(':id_uzytkownikaFKRez', $this->id_uzytkownikaFKRez);
            $stmt->bindParam(':iloscUczen', $this->iloscUczen);
            $stmt->bindParam(':iloscStudent', $this->iloscStudent);
            $stmt->bindParam(':id_repertuaruFKRez', $this->id_repertuaruFKRez);
            $stmt->bindParam(':cena', $this->cena);

            if($stmt->execute()){
                $stmt->closeCursor();
                $this->getIdRezerwacji();
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return FALSE;
        }
    }