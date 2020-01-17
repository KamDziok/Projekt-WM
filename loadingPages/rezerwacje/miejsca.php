<?php

$miejsca = json_decode(file_get_contents('php://input'), TRUE);
// $miejsca = file_get_contents('php://input');

if(!file_exists("miejscaLP.json")){
    $file = fopen("miejscaLP.json","w");
    fclose($file);
}

file_put_contents("miejscaLP.json", json_encode($miejsca));