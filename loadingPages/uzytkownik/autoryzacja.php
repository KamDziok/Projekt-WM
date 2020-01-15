<?php

$dateUser;
$dateNow = new DateTime();
$dateAdd = new DateInterval('PT30M');

$dateTMP = new DateInterval('PT20M');

include_once "../model/Uzytkownik.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$user = new Uzytkownik();
try{
    $data = json_decode(file_get_contents('php://input'));

    $user->id = $data->id;

    $dateNow = new DateTime();
    $dateAccept = new DateTime();
    $dateTmp = new DateTime();
    $dateTmp->add($dateTMP);
    $dateAccept->add($dateAdd);

}catch(Exception $e){
    echo json_encode(array('message' => $e->getMessage));
}

echo $dateNow->format('Y-m-d H:i:s') . " --- " . $dateAccept->format('Y-m-d H:i:s');
if( $dateTmp < $dateAccept){
    echo "dobrze";
}else{
    echo "zle";
}