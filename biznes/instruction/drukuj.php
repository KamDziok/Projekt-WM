<?php

    include_once './../curl.php';
    include_once './../model/Repertuar.php';
    include_once './../model/Rezerwacje.php';
    include_once './../model/Bilet.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/interfejs/potwierdzenie.php';
    $urlBaza = 'http://localhost:8080/WM/projekt/Projekt-WM/API/rezerwacje/';  //dokończyć

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
    $idRepertuar = $listonosz['idRepertuaru'];
    $idUzytkownika = $listonosz['idUzytkownika'];

    $idRezerwacji = $listonosz['idRezerwacji'];

    $dzienTygodnia = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);

    $Repertuar = new Repertuar($data, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Bilet = new Bilet($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);
    $doDruku = $Bilet->drukujBilet($sala, $data);

    $wyslij['idRezerwacji'] = $idRezerwacji;
    $ch->setPostURL($urlBaza, json_encode($wyslij));
    $result = $ch->exec();

    echo json_encode(array($doDruku));
    // $wyslij[] = $doDruku;

    //wyslanie ceny do frontu
    // $ch->setPostURL($url, $wyslij);
    // $ch->exec();
?>