<?php
try{
    // header('Access-Control-Allow-Origin: *');
    // header('Content-Type: application/json');
    // header('Access-Control-Allow-Methods: POST');
    // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'user.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $user = new User($data['login'], $data['password']);

    $json = json_encode($user);

    include_once 'curl.php';

    $ch = new ClientURL();

    $url = 'http://localhost:8080/WM/git/Projekt-WM/API/user/create.php';
    $ch->setPostURL($url, $json);

    $ch->exec();

    echo 'Uzytkownik zostal dodany.';
}catch(Exception $e){
    echo $e->getMassage();
}