<?php

$ch = curl_init();

$url = 'http://localhost:8080/WM/git/Projekt-WM/API/user/read.php';

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$rezult = curl_exec($ch);
curl_close($ch);
file_put_contents('user.json', $rezult);

echo json_encode(file_get_contents('user.json'));