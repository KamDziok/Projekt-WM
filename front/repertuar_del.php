<?php

session_start();
	
	if (!isset($_SESSION['inicjuj']))
	{
		session_regenerate_id();
		$_SESSION['inicjuj'] = true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    }

include_once 'curl.php';


$id_repertuatu = $_POST['id_repertuatu'];


//porównanie haseł

$ch = new ClientURL();


$url = 'http://localhost:8080/WM/projekt/Projekt-WM/API/repertuar/delete.php';
$arrayData = array('id_repertuaru' => $id_repertuatu);
$dataToAppi = json_encode($arrayData);

$ch->setPostURL($url, $dataToAppi);
$wynik = $ch->exec();

$json = json_decode($wynik, TRUE);

if($json['message']){
    header('Location: index.php');
}else{
	header('Location: register.php');
}