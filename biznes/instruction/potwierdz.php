<?php

    include_once './../curl.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/interfejs/podsumowanie.php';
    $urlBaza = 'http://localhost:8080/WM/projekt/Projekt-WM/API/';  // dokonczyc sciezke

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
    $id = $listonosz[12];

    $Repertuar = new Repertuar($film, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Rezerwacja = new Rezerwacje($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);
    $Rezerwacja->potwierdz($id);

    $wyslij[] = $idUzytkownika;
    $wyslij[] = $idRepertuar;
    $wyslij[] = $iloscUczen;
    $wyslij[] = $iloscStudent;
    $wyslij[] = 0;
    $wyslij[] = $miejsca;
    $ch->setPostURL($urlBaza, $wyslij);
    
    //wyslanie do bazy rezerwacji (idUzytkownika, idRepertuaru, iloscStudent, iloscUczen, bilet = 0, miejsca)

    //wyslanie ceny do frontu
    $odp = true;
    $ch->setPostURL($url, $odp);
?>