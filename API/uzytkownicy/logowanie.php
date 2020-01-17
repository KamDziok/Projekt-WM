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

//inicjalizacja obiektu User
$user = new Uzytkownik($db);

try{
    $data = json_decode(file_get_contents('php://input', true));

    $user->login = $data->login;
    $user->password = $data->password;

    //utworz uzytkownika
    if($user->chechUzytkownikExist()){

        $user->password = "";
        echo json_encode(array("loginW" => true, $user));
        // echo json_encode($user);
    }else{
        echo json_encode(array('loginW' => false));
    }
}catch(Exception $e){
    echo json_encode(array('message' => $e->getMessage));
}