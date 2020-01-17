<?php
//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './../config/Database.php';
include_once './../models/Uzytkownik.php';

//inicjalizacja polaczenia z baza danych
$database = new Database();
$db = $database->connect();

$user = new Uzytkownik($db);

try{
    $data = json_decode(file_get_contents('php://input'), TRUE);

    // $user->id = $data->id;
    $user->id_uzytkownika = $data['id'];

    //utworz uzytkownika
    if($user->deleteUserById()){
        echo json_encode(array('message' => 'User delete'));
    }else{
        echo json_encode(array('message' => 'User Not Exist'));
    }
}catch(Exception $e){
    echo json_encode(array('message' => $e->getMessage()));
}