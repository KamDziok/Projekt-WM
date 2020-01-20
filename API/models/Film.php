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
        $query = 'SELECT id_filmu, tytul, rezyser, opis FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getFilmById(){
        $query = 'SELECT id_filmu, tytul, rezyser, opis FROM ' . $this->table . ' WHERE id_filmu = ?';

        $stmt = $this->conn->prepare($query);

        //dodanie parametru
        $stmt->BindParam(1, $this->id_filmu);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->$id_filmu = $row['id_filmu'];
        $this->tytul = $row['tytul'];
        $this->rezyser = $row['rezyser'];
        $this->opis = $row['opis'];
    }

    public function deleteFilmById(){
        'DELETE FROM ' . $this->table . ' WHERE id = ?';
        
        $stmt = $this->conn->prepare($query);
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table .'
        SET 
            id_filmu = :id_filmu,
            tytul = :tytul,
            rezyser = :rezyser,
            opis = :opis;
        ';

        $stmt = $this->conn->prepare($query);

        //czyszczenie danych
        $this->id_filmu = htmlspecialchars(strip_tags($this->id_filmu));
        $this->tytul = htmlspecialchars(strip_tags($this->tytul));
        $this->rezyser = htmlspecialchars(strip_tags($this->rezyser));
        $this->opis = htmlspecialchars(strip_tags($this->opis));

        $stmt->bindParam(':id_filmu', $this->id_filmu);
        $stmt->bindParam(':tytul', $this->tytul);
        $stmt->bindParam(':rezyser', $this->rezyser);
        $stmt->bindParam(':opis', $this->opis);

        if($stmt->execute()){
            return true;
        }

        //wypisz blad
        printf('Error: %s.\n', $stmt->error);

        return false;
    }
}