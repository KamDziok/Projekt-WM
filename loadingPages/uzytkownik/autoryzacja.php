<?php

$dateUser;
$dataOld;
$dateNow = new DateTime();

include_once "../model/Uzytkownik.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$user = new Uzytkownik();
try{
    $data = json_decode(file_get_contents('php://input'));

    $user->id_uzytkownika = $data->id;

    $index = 0;
    $arr_data = file_get_contents("uzytkownicy.json");
    $arr_data = json_decode($arr_data, true);
    for($i = 0; $i < count($arr_data); $i++){
        if($arr_data[$i]["id"] == $user->id_uzytkownika){

            $dateOld = new DateTime($arr_data[$i]["date"]["date"]);
            $index = $i;
            break;
        }
    }
    $dateAdd = new DateInterval('PT30M');
    $dateOld->add($dateAdd);
    
    if($dateNow < $dateOld){
        $arr_data[$index]["date"] = $dateNow;

        $putArray = json_encode($arr_data, true);
        file_put_contents("uzytkownicy.json", $putArray);

        echo json_encode(array("autozyzacja" => TRUE));
    }else{
        echo json_encode(array("autozyzacja" => FALSE));
    }


}catch(Exception $e){
    echo json_encode(array('message' => $e->getMessage));
}