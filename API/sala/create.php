<?php

//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './../config/Database.php';
include_once './../models/Sala.php';

//inicjalizacja polaczenia z baza danych
$database = new Database();
$db = $database->connect();

//inicjalizacja obiektu Repertuar
$sala = new Sala($db);

try{
    $data = json_decode(file_get_contents('php://input'), true);

    $sala->numer_sali = $data['numer_sali'];
    $sala->liczba_miejsc =$data['liczba_miejsc'];

    //utworz repertuar
    if($sala->create()){
        echo json_encode(array('message' => 'Sala Created'));
    }else{
        echo json_encode(array('message' => 'Sala Not Created'));
    }
    }catch(Exception $e){
        echo $e->getMessage();
    }