<?php

    include_once './../curl.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/interfejs/podsumowanie.php';
    $urlBaza = 'http://localhost:8080/WM/projekt/Projekt-WM/API/rezerwacje/create.php';  

    //odebranie danych
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    $listonosz = json_decode(file_get_contents('php://input'), TRUE);

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
    $idRepertuar = $listonosz[12];
    $idUzytkownika = $listonosz[13];
    $id = $listonosz[14];
    $admin = $listonosz[15];
    $dzienTygodnia = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);

    $Repertuar = new Repertuar($film, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Rezerwacja = new Rezerwacje($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);
    $Rezerwacja->potwierdz($id);

    $wyslij['idUzytkownika'] = $idUzytkownika;
    $wyslij['idRepertuaru'] = $idRepertuar;
    $wyslij['iloscUczen'] = $iloscUczen;
    $wyslij['iloscStudent'] = $iloscStudent;
    if($admin == 1) $wyslij['bilet'] = 0;
    else $wyslij['bilet'] = 1;
    $wyslij['miejsca'] = $miejsca;
    $ch->setPostURL($urlBaza, $wyslij);
    $result = $ch->exec();
    $odpAPI = json_decode($result, TRUE);
    if($odpAPI['Rezerwacja']){
        //wyslanie ceny do frontu
        // $odp = true;
        // $ch->setPostURL($url, $odp);
        // $ch->exec();
        echo json_encode(array("odp" => TRUE));
    }else{
        // $odp = false;
        // $ch->setPostURL($url, $odp);
        // $ch->exec();
        echo json_encode(array("odp" => FALSE));
    }
    
    //wyslanie do bazy rezerwacji (idUzytkownika, idRepertuaru, iloscStudent, iloscUczen, bilet = 0, miejsca)


?>