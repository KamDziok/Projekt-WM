<?php

class Film{
    //baza
    private $conn;
    private $table = 'film';

    //wlasciwosci miejsca
    public $id_filmu;
    public $tytul;
    public $rezyser;
    public $opis; 

    public function __construct($db){
        $this->conn = $db;
    }

    public function getFilmAll(){
        $query = 'SELECT id, id_sali FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getFilmById(){
        $query = 'SELECT id_filmu, tytul, rezyser, opis FROM ' . $this->table . ' WHERE id = ?';

        $stmt = $this->conn->prepare($query);

        //dodanie parametru
        $stmt->BindParam(1, $this->id_miejsca);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id_miejsca = $row['id'];
        $this->id_saliFKMie = $row['id_sali'];
    }

    public function deleteFilmById(){
        'DELETE FROM ' . $this->table . ' WHERE id = ?';
        
        $stmt = $this->conn->prepare($query);
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table .'
        SET 
            id = :id_miejsca,
            id_sali = :id_saliFKMie;
        ';

        $stmt = $this->conn->prepare($query);

        //czyszczenie danych
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->id_sali = htmlspecialchars(strip_tags($this->id_sali));

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':id_sali', $this->id_sali);

        if($stmt->execute()){
            return true;
        }

        //wypisz blad
        printf('Error: %s.\n', $stmt->error);

        return false;
    }
}