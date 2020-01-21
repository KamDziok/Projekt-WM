<?php

    include_once './../curl.php';
    include_once './../model/Repertuar.php';
    include_once './../model/Rezerwacje.php';
    include_once './../model/Ceny.php';

    $ch = new ClientURL();
    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/interfejs/podsumowanie.php';
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
    $idRepertuar = $listonosz['idRepertuaru'];
    $idUzytkownika = $listonosz['idUzytkownika'];
    // $id = $listonosz['indexMiejscaTab'];
    $admin = $listonosz['admin'];
    $dzienTygodnia = mktime($godzina, $minuta, 0, $miesiac, $dzien, $rok);

    $Repertuar = new Repertuar($data, $godzina, $minuta, $miesiac, $dzien, $rok, $sala);
    $Rezerwacja = new Rezerwacje($Repertuar, $imie, $nazwisko, $miejsca, $iloscUczen, $iloscStudent);
    $Rezerwacja->potwierdz($id);

    $wyslij['idUzytkownika'] = $idUzytkownika;
    $wyslij['idRepertuaru'] = $idRepertuar;
    $wyslij['iloscUczen'] = $iloscUczen;
    $wyslij['iloscStudent'] = $iloscStudent;
    if($admin == 0) $wyslij['bilet'] = 0;
    else $wyslij['bilet'] = 1;
    // $wyslij['miejsca'] = $miejsca;

    $ch->setPostURL($urlBaza, json_encode($wyslij));
    $result = $ch->exec();

    $odpAPI = json_decode($result, TRUE);

    if($odpAPI['Rezerwacja']){
        echo json_encode(array("odp" => TRUE, "idRezerwacji" => $odpAPI['idRezerwacji']));
    }else{
        echo json_encode(array("odp" => FALSE));
    }
?>