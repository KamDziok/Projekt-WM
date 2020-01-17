<?php

    include_once './../curl.php';
    include_once './../model/Repertuar.php';
    include_once './../model/Rezerwacje.php';
    include_once './../model/Ceny.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/rezerwacje/miejsca.php';//uzupełnij

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
    $dzienTygodnia = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);

    $Repertuar = new Repertuar($film, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Rezerwacja = new Rezerwacje($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);

    if($Rezerwacja->rezerwuj($idRepertuar, $miejsca) < 0){
        //wyslanie informacji o niepowodzeniu i o prosbie odswiezenia strony(miejsca zajete)
        $wyslij['rezerwacja'] = false;

    }else{

        $json = json_decode(file_get_contents("miejsca.json"), TRUE);
        $ch->setPostURL($url, json_encode($json));
        $ch->exec();

        $Ceny = new Ceny();
        $wyslij['rezerwacja'] = true;
        $wyslij['cena'] = $Rezerwacja->obliczCene($Ceny, date('N', $dzienTygodnia));
        $wyslij['indexTabeliMiejsca'] = $miejsca;
    }

    echo json_encode($wyslij);
    //wyslanie ceny do frontu
    // $ch->setPostURL($url, $wyslij);
    // $ch->exec();
?>