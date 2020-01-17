<?php

    include_once './../curl.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/interfejs/potwierdzenie.php';

    //odebranie danych
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    $listonosz = json_decode(file_get_contents('php://input'));

    $data = $listonosz[0];
    $godzina = $listonosz[1];
    $minuta = $listonosz[2];
    $miesiac = $listonosz[3];
    $dzien = $listonosz[4];
    $rok = $listonosz[5];
    $sala = $listonosz[6];
    $imie = $listonosz[7];
    $nazwisko = $listonosz[8];
    $miejsca = $listonosz[9];
    $iloscUczen = $listonosz[10];
    $iloscStudent = $listonosz[11];
    $idRepertuar = $listonosz[11];
    $idUzytkownika = $listonosz[11];
    $dzienTygodnia = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);

    $Repertuar = new Repertuar($data, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Bilet = new Bilet($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);
    $doDruku = $Bilet->drukujBilet();

    $wyslij[] = $doDruku;

    //wyslanie ceny do frontu
    $ch->setPostURL($url, $wyslij);
?>