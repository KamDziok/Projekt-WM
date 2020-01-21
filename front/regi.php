<?php

session_start();
	
	if (!isset($_SESSION['inicjuj']))
	{
		session_regenerate_id();
		$_SESSION['inicjuj'] = true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    }

include_once 'curl.php';


$login = $_POST['login'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$mail = $_POST['mail'];
$passwordOne = $_POST['passwordOne'];
$passwordTwo = $_POST['passwordTwo'];

//porównanie haseł

$ch = new ClientURL();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/uzytkownik/rejestracja.php';
$arrayData = array('login' => $login, 'password' => $passwordOne, 'email' => $mail, 'imie' => $imie, 'nazwisko' => $nazwisko);
$dataToAppi = json_encode($arrayData);

$ch->setPostURL($url, $dataToAppi);
$wynik = $ch->exec();

$json = json_decode($wynik, TRUE);

if($json['message']){
    header('Location: index.php');
}else{
	header('Location: register.php');
}