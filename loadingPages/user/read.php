<?php

include_once './../curl.php';

$ch = new ClientURL();

$url = 'http://localhost:8080/WM/git/Projekt-WM/API/user/read.php';

$ch->setGetURL($url);
$rezult = $ch->exec();

$arr_data = json_decode($rezult, true);
//arr = $arr_data['data'];
$json = json_encode($arr_data);
//var_dump($json);
file_put_contents('user.json', $json);

$strJsonFileContents = file_get_contents("user.json");
echo $strJsonFileContents;