<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../config/Database.php';
    include_once './../models/User.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu User
    $user = new User($db);

    //pobierz ID z URL
    $user->id = isset($_GET['id']) ? $_GET['id'] : die();

    $user->readSingle();

    $user_arr = array(
        'id' => $id,
        'login' => $login,
        'password' => $password
    );

    print_r(json_encode($user_arr));