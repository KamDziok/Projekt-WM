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

$sala = new Sala($db);

try{
    $data = json_decode(file_get_contents('php://input'), TRUE);

    // $user->id = $data->id;
    $sala->id_sali = $data['id'];

    //utworz uzytkownika
    if($sala->deleteSalaById()){
        echo json_encode(array('message' => 'Sala delete'));
    }else{
        echo json_encode(array('message' => 'Sala Not Exist'));
    }
}catch(Exception $e){
    echo json_encode(array('message' => $e->getMessage()));
}