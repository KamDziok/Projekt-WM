<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once './../config/Database.php';
    include_once './../models/User.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu User
    $user = new User($db);
    try{
    $data = json_decode(file_get_contents('php://input'));

    $user->id = $data->id;
    $user->login = $data->login;
    $user->password = $data->password;

    //utworz uzytkownika
    if($user->create()){
        echo json_encode(array('message' => 'User Created'));
    }else{
        echo json_encode(array('message' => 'User Not Created'));
    }
    }catch(Exception $e){
        echo $e->getMessage;
    }