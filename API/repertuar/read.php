<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../config/Database.php';
    include_once './../models/Repertuar.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu Repertuar
    $rep = new Repertuar($db);

    //User zapytanie
    $result = $rep->getRepertuarAll();

    //pobierz wiersz zapytania
    $num = $result->rowCount();

    //sprawdz czy uzytkownicy istnieja
    if($num > 0){
        //tablica uzytkownikow
        $rep_arr = array();
        $rep_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $rep_item = array(
                'id_repertuaru' => $id_repertuaru,
                'filmu' => $filmu,
                'id_sali' => $id_sali,
                'data' => $data,
            );

            //umiesc w "data"
            array_push($rep_arr['data'], $rep_item);
        }

        //umiesc w JSON i wyrzuc
        echo json_encode($rep_arr);
    }else{
        //nie ma uzytkownikow
        echo json_encode(
            array('massage' => 'No Repertuar found')
        );
    }