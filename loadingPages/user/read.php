<?php

$ch = curl_init();

$url = 'http://localhost:8080/WM/git/Projekt-WM/API/user/read.php';

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$rezult = curl_exec($ch);
curl_close($ch);

$arr_data = json_decode($rezult, true);
$arr = $arr_data['data'];
//$array_data = array();
//$array = array();
//foreach($arr_JSON)
$json = json_encode($arr_data);
//var_dump($json);
file_put_contents('user.json', $json);

// $fp = fopen('user.json', 'w');
// fwrite($fp, $json);
// fclose($fp);

$strJsonFileContents = file_get_contents("user.json");
echo $strJsonFileContents;
//var_dump(json_decode($strJsonFileContents));

//echo json_encode(file_get_contents('user.json'));
//echo file_get_contents('user.json');