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

        public function __construct($db){
            $this->conn = $db;
        }

        //funkcje z SQL...

        public function getUzytkownicyAll(){
            $query = 'SELECT id_rezerwacji, bilet, user_id, ilosc_uczen_senior, ilosc_student, id_repertuaru FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function getUzytkownicyById(){
            $query = 'SELECT id_rezerwacji, bilet, user_id, ilosc_uczen_senior, ilosc_student, id_repertuaru FROM ' . $this->table . ' WHERE id = ?';

            $stmt = $this->conn->prepare($query);

            //dodanie parametru
            $stmt->BindParam(1, $this->id_rezerwacji);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this-> id_rezerwacji = $row['id_rezerwacji'];
            $this-> bilet = $row['bilet'];
            $this-> id_uzytkownikaFKRez = $row['user_id'];
            $this-> iloscUczen = $row['ilosc_uczen_senior'];
            $this-> iloscStudent = $row['ilosc_student'];
            $this-> id_repertuaruFKRez = $row['id_repertuaru'];
        }

        
        public function create(){
            $query = 'INSERT INTO ' . $this->table .'
            SET 
            id_rezerwacji = :id_rezerwacji,
            bilet = :bilet,
            user_id = :id_uzytkownikaFKRez,
            ilosc_uczen_senior = :iloscUczen,
            ilosc_student = :iloscStudent,
            id_repertuaru = :id_repertuaruFKRez
            ';

            $stmt = $this->conn->prepare($query);

            //czyszczenie danych
            $this->id_rezerwacji = htmlspecialchars(strip_tags($this->id_rezerwacji));
            $this->bilet = htmlspecialchars(strip_tags($this->bilet));
            $this->id_uzytkownikaFKRez = htmlspecialchars(strip_tags($this->id_uzytkownikaFKRez));
            $this->iloscUczen = htmlspecialchars(strip_tags($this->iloscUczen));
            $this->ilosc_student = htmlspecialchars(strip_tags($this->ilosc_student));
            $this->id_repertuaru = htmlspecialchars(strip_tags($this->id_repertuaru));

            $stmt->bindParam(':id_rezerwacji', $this->id_rezerwacji);
            $stmt->bindParam(':bilet', $this->bilet);
            $stmt->bindParam(':id_uzytkownikaFKRez', $this->id_uzytkownikaFKRez);
            $stmt->bindParam(':iloscUczen', $this->iloscUczen);
            $stmt->bindParam(':ilosc_student', $this->ilosc_student);
            $stmt->bindParam(':id_repertuaru', $this->id_repertuaru);

            if($stmt->execute()){
                return true;
            }

            //wypisz blad
            printf('Error: %s.\n', $stmt->error);

            return false;
        }
    }