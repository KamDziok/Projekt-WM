<?php

//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './../config/Database.php';
include_once './../models/Rezerwacja.php';
include_once './../models/RezerwacjeMiejsca.php';

//inicjalizacja polaczenia z baza danych
$database = new Database();
$db = $database->connect();

$rezerwacja = new Rezerwacja($db);

try{
    $data = json_decode(file_get_contents('php://input'), true);

    $rezerwacja->bilet = $data['bilet'];
    $rezerwacja->id_uzytkownikaFKRez = $data['idUzytkownika'];
    $rezerwacja->iloscUczen = $data['iloscUczen'];
    $rezerwacja->iloscStudent = $data['iloscStudent'];
    $rezerwacja->id_repertuaruFKRez = $data['idRepertuaru'];
    $rezerwacja->bilet = $data['bilet'];
    $rezerwacja->cena = $data['cena'];

    if($rezerwacja->create()){
        $youCenRun = TRUE;
        

        $arrayMiejsca = $data['miejsca'];
        for($i = 0; $i < count($arrayMiejsca); $i++){
            $rezerwacjeMiejsca = new RezerwacjeMiejsca($db);

            $rezerwacjeMiejsca->id_miejscaFHRezMie = $data['miejsca'][$i];
            $rezerwacjeMiejsca->id_rezerwacjiFKRezMie = $rezerwacja->id_rezerwacji;

            if(!$rezerwacjeMiejsca->create()){
                $youCenRun = FALSE;
                break;
            }
        }

        if($youCenRun){
            echo json_encode(array("Rezerwacja" => TRUE, "idRezerwacji" => $rezerwacja->id_rezerwacji));
        }else{
            echo json_encode(array("Rezerwacja" => FALSE));
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}