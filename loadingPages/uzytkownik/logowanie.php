<?php

include_once "../model/Uzytkownik.php";
include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/uzytkownicy/logowanie.php';

$user = new Uzytkownik();

$dataFormUser = json_decode(file_get_contents('php://input'));
$dataToAppi = json_encode($dataFormUser);

$ch->setPostURL($url, $dataToAppi);
$rezult = $ch->exec();

$json = json_decode($rezult, true);

$login = $json['loginW'];

//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

if($login){
    try{
        $test = true;
        $rowInArray = array("id" => $json[0]['id_uzytkownika'], "date" => new DateTime());
        if(!file_exists("uzytkownicy.json")){
            $file = fopen("uzytkownicy.json","w");
            fclose($file);
            $arr_data = array();
        }else{
            $arr_data = file_get_contents("uzytkownicy.json");
            $arr_data = json_decode($arr_data, true);

            for($i = 0; $i < count($arr_data); $i++){
                // if($arr_data[$i]["id"] === $json[0]['id_uzytkownika']){
                if(strcmp($arr_data[$i]["id"], $json[0]['id_uzytkownika']) == 0){
                    $arr_data[$i]['date'] = new DateTime();
                    $test = false;
                    break;
                }
            }
        }   

        if($test){
            array_push($arr_data, $rowInArray);
        }

        $putArray = json_encode($arr_data, true);

        file_put_contents("uzytkownicy.json", $putArray);

        echo json_encode($json[0], true);

    }catch(Exception $e){
        echo json_encode(array('message' => $e->getMessage));
    }
}else{
    echo json_encode(array('weryfikacja' => false));
}