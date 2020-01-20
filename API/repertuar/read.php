<?php
    //naglowek
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../config/Database.php';
    include_once './../models/Repertuar.php';
    include_once './../models/Film.php';

    //inicjalizacja polaczenia z baza danych
    $database = new Database();
    $db = $database->connect();

    //inicjalizacja obiektu Repertuar
    $rep = new Repertuar($db);
    $film = new Film($db);

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
                'film' => $id_filmu,
                'id_sali' => $id_sali,
                'data' => $data,
            );

            $film->id_filmu = $id_filmu;
            $film->getFilmById();

            //umiesc w "data"
            array_push($rep_arr['data'], $rep_item);
            $index = count($rep_arr['data']);
            $rep_arr['data'][$index-1]['film'] = $film;
        }

        //umiesc w JSON i wyrzuc
        echo json_encode($rep_arr);
    }else{
        //nie ma uzytkownikow
        echo json_encode(
            array('massage' => 'No Repertuar found')
        );
    }