<?php

    include_once './../curl.php';
    include_once './../model/Repertuar.php';
    include_once './../model/Rezerwacje.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/rezerwacje/miejsca.php';
    $urlBaza = 'http://localhost:8080/WM/projekt/Projekt-WM/API/rezerwacje/create.php'; 

    //odebranie danych
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    $listonosz = json_decode(file_get_contents('php://input'), TRUE);

    $data = $listonosz['data'];
    $godzina = $listonosz['godz'];
    $minuta = $listonosz['min'];
    $miesiac = $listonosz['miesiac'];
    $dzien = $listonosz['dzien'];
    $rok = $listonosz['rok'];
    $sala = $listonosz['idSali'];
    $imie = $listonosz['imie'];
    $nazwisko = $listonosz['nazwisko'];
    $miejsca = $listonosz['miejsca'];
    $iloscUczen = $listonosz['iloscUczen'];
    $iloscStudent = $listonosz['iloscStudent'];
    $idRezerwacji = $listonosz['idRezerwacji'];
    $id = $listonosz['indexMiejscaTab'];
    $dzienTygodnia = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);

    $Repertuar = new Repertuar($data, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Rezerwacja = new Rezerwacje($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);

    $Rezerwacja->anuluj($id);
    $json = json_decode(file_get_contents("miejsca.json"), TRUE);
    $ch->setPostURL($url, json_encode($json));
    $ch->exec();

    //wyslanie do bazy info o usuniecie rekordy
    $ch->setPostURL($url, json_encode(array("idRezerwacji" => $idRezerwacji)));
    $ch->exec();

    echo json_encode(array("odp" => TRUE));
?>