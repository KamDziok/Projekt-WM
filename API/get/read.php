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

    //User zapytanie
    $result = $user->read();

    //pobierz wiersz zapytania
    $num = $result-rowCount();

    //sprawdz czy uzytkownicy istnieja
    if($num > 0){
        //tablica uzytkownikow
        $user_arr = array();
        $user_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $user_item = array(
                'id' => $id,
                'login' => $login,
                'password' => $password
            );

            //umiesc w "data"
            array_push($user_arr['data'], $user_item);
        }

        //umiesc w JSON i wyrzuc
        echo json_encode($user_arr);
    }else{
        //nie ma uzytkownikow
        echo json_encode(
            array('massage' => 'No User found')
        );
    }