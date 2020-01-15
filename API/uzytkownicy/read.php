<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../config/Database.php';
    include_once './../models/Uzytkownik.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu User
    $user = new Uzytkownik($db);

    //User zapytanie
    $result = $user->getUzytkownicyAll();

    //pobierz wiersz zapytania
    $num = $result->rowCount();

    //sprawdz czy uzytkownicy istnieja
    if($num > 0){
        //tablica uzytkownikow
        $user_arr = array();
        $user_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $user_item = array(
                'id' => $user_id,
                'login' => $nick,
                'admin' => $uprawnienia_administracyjne,
                'email' => $mail,
                'imie' => $imie,
                'nazwisko' => $nazwisko
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