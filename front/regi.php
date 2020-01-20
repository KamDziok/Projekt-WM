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

