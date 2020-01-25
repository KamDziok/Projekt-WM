<?php

    include_once './../curl.php';
    include_once './../model/Repertuar.php';
    include_once './../model/Rezerwacje.php';
    include_once './../model/Ceny.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/rezerwacje/miejsca.php';

    //odebranie danych
    // header('Access-Control-Allow-Origin: *');
    // header('Content-Type: application/json');
    // header('Access-Control-Allow-Methods: POST');
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    
    $listonosz = json_decode(file_get_contents('php://input'), TRUE);
    
    $data = $listonosz['data']; //tytul
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
    // var_dump($listonosz);

    $Repertuar = new Repertuar($data, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Rezerwacja = new Rezerwacje($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);

    $index = $Rezerwacja->rezerwuj($idRepertuar, $miejsca);
    if($index < 0){
        //wyslanie informacji o niepowodzeniu i o prosbie odswiezenia strony(miejsca zajete)
        $wyslij['rezerwacja'] = false;
    }else{
        $json = json_decode(file_get_contents("miejsca.json"), TRUE);
        $ch->setPostURL($url, json_encode($json));
        $ch->exec();

        $Ceny = new Ceny();

        $wyslij['rezerwacja'] = true;
        $wyslij['cena'] = $Rezerwacja->obliczCene($Ceny, date('N', $dzienTygodnia));
        $wyslij['indexTabeliMiejsca'] = $index;
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    echo json_encode($wyslij);
?>