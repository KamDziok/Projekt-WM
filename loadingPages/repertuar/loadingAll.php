<?php

include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/repertuar/read.php';

$ch->setGetURL($url);
$result = $ch->exec();

$array = json_decode($result, true);

$dateNow = new DateTime();
$toPage = array();

for($i = 0; $i < count($array['data']);$i++){
    $dataRep = DateTime::createFromFormat('Y-m-d H:i:s', $array['data'][$i]['data']);
    if($dataRep < $dateNow){
        array_push($toPage, $array['data'][$i]);
    }
}

//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($toPage);