<?php

include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/repertuar/read_single.php';

$dataFormUser = json_decode(file_get_contents('php://input'));
$dataToAppi = json_encode($dataFormUser);

$ch->setPostURL($url, $dataToAppi);
$rezult = $ch->exec();
echo json_encode(json_decode($rezult, true));

// $json = json_decode($rezult, true);

// $repertuar = $json['repertuar'];
// $film = $json['film'];

// echo json_encode(array('repertuar' => $repertuar, 'film' => $film));