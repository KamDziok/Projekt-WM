<?php

include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/repertuar/read_single.php';

$dataFormUser = json_decode(file_get_contents('php://input'));
$dataToAppi = json_encode($dataFormUser);

$ch->setPostURL($url, $dataToAppi);
$rezult = $ch->exec();

$json = json_decode($rezult, true);

echo json_encode($json);