<?php

include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/repertuar/create.php';

$dataFormUser = json_decode(file_get_contents('php://input'), true);
    // var_dump($dataFormUser);
$date = array('data' => new DateTime());                    //tymczasowe
$dataFormUserTMP = array_merge($dataFormUser, $date);       //tymczasowe
$dataToAppi = json_encode($dataFormUserTMP, true);
    // var_dump($dataToAppi);
$ch->setPostURL($url, $dataToAppi);
$result = $ch->exec();

$array = json_decode($result, true);
//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($array);