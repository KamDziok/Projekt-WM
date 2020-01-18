<?php
//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './../config/Database.php';
include_once './../models/Repertuar.php';

//inicjalizacja polaczenia z baza danych
$database = new Database();
$db = $database->connect();

$repertuar = new Repertuar($db);

try{
    $data = json_decode(file_get_contents('php://input'), TRUE);

    $repertuar->id_repertuaru = $data['idRepertuaru'];

    if($repertuar->getRepertuarById()){
        echo json_encode($repertuar);
    }else{
        echo json_encode(array('message' => 'Repertuar Not Exist'));
    }
}catch(Exception $e){
    echo json_encode(array('message' => $e->getMessage()));
}