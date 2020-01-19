<?php

//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './../config/Database.php';
include_once './../models/Rezerwacja.php';
include_once './../models/RezerwacjeMiejsca.php';

//inicjalizacja polaczenia z baza danych
$database = new Database();
$db = $database->connect();

$rezerwacja = new Rezerwacja($db);

try{
    $data = json_decode(file_get_contents('php://input'), true);

    $rezerwacja->id_rezerwacji = $data['idRezerwacji'];

    if($rezerwacja->kupBilet()){
        echo json_encode(array("Rezerwacja" => TRUE));
    }else{
        echo json_encode(array("Rezerwacja" => FALSE));
    }
}catch(Exception $e){
    echo $e->getMessage();
}