<?php

include_once "../model/Uzytkownik.php";
include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/uzytkownicy/logowanie.php';

$user = new Uzytkownik();

//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$dataFormUser = json_decode(file_get_contents('php://input'));

$ch->setPostURL($url, $dataFormUser);
$rezult = $ch->exec();

$json = json_decode($result, true);
$login = $json->loginW;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

if($login){
    try{
        if(file_exists()){
            $file = fopen("uzytkownicy.json","w");
            $file->close();
        }   
        
        $arr_data = json_decode("uzytkownicy.json", true);

        for( $i = 0; $i < $arr_data; $i++){
            echo $arr_data;
        }

    }catch(Exception $e){
        echo json_encode(array('message' => $e->getMessage));
    }
}else{
    echo json_encode(array('weryfikacja' => false));
}