<?php

session_start();
	
	if (!isset($_SESSION['inicjuj']))
	{
		session_regenerate_id();
		$_SESSION['inicjuj'] = true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    }

include_once 'curl.php';


$login = $_SESSION['login'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$mail = $_SESSION['mail'];
$passwordOne = $_SESSION['passwordOne'];
$passwordTwo = $_SESSION['passwordTow'];

//porównanie haseł

$ch = new ClientURL();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/uzytkownik/rejestracja.php';
$arrayData = array('login' => $login, 'password' => $passwordOne, 'email' => $mail, 'imie' => $imie, 'nazwisko' => $nazwisko);

$ch->setPostURL($url, $arrayData);
$wynik = $ch->exec();

$json = json_decode($wynik, TRUE);

if($json['message'] == 'User Exist'){
    //uzytkownik isynieje
}
if($json['message'] == 'User Created'){
    //stworzona uzytkownika
}else{
    //nie stworzono uzytkownika
}