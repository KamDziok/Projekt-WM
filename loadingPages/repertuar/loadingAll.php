<?php

include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/repertuar/read.php';

$ch->setGetURL($url);
$result = $ch->exec();

$array = json_decode($result, true);
//naglowek
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($array['data']);