<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../config/Database.php';
    include_once './../models/Sala.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu User
    $sala = new Sala($db);

    //User zapytanie
    $result = $sala->getSalaAll();

    //pobierz wiersz zapytania
    $num = $result->rowCount();

    //sprawdz czy uzytkownicy istnieja
    if($num > 0){
        //tablica uzytkownikow
        $sala_arr = array();
        $sala_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $sala_item = array(
                'id' => $id_sali,
                'numer sali' => $numer_sali,
                'liczba_miejsc' => $liczba_miejsc
            );

            //umiesc w "data"
            array_push($sala_arr['data'], $sala_item);
        }

        //umiesc w JSON i wyrzuc
        echo json_encode($sala_arr);
    }else{
        //nie ma uzytkownikow
        echo json_encode(
            array('massage' => 'No Sala found')
        );
    }