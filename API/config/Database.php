<?php

class Database{
    //parametry bazy danych
    private $host='localhost:3306';
    private $db_name = 'kino';
    private $username = 'root';
    private $password = '';
    private $conn;

    //polaczenie z baza danych
    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
            $this->username);//, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }catch(Exception $e2){
            echo 'Error: ' . $e2->getMessage();
        }

        return $this->conn;
    }
}