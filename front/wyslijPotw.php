<?php

session_start();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/repertuar/read_single.php';
$urlBiznes = 'http://localhost:8080/WM/projekt/Projekt-WM/biznes/instruction/rezerwuj.php';

include_once 'curl.php';

$ch = new ClientURL();

$wyslij['id'] = $_GET['id'];
$index = $_GET['index'];

// $ch->setPostURL($url, $wyslij);
// $rezult = $ch->exec();
$listonosz['data'] = $_SESSION['tytul'];//tytul

$dataRep = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['dataRep']);
$listonosz['data'] = $result[''];//tytul
$listonosz['godz'] = intval($dataRep->format('H'));
$listonosz['min'] = intval($dataRep->format('i'));
$listonosz['miesiac'] = intval($dataRep->format('m'));
$listonosz['dzien'] = intval($dataRep->format('d'));
$listonosz['rok'] = intval($dataRep->format('Y'));
$listonosz['idSali'] = intval($_SESSION['idSali']);
$listonosz['imie'] = $_POST['imie'];
$listonosz['nazwisko'] = $_POST['nazwisko'];
$listonosz['miejsca'] = $_POST['miejsca'];
$listonosz['iloscUczen'] = intval($_POST['iloscSzkolne']);
$listonosz['iloscStudent'] = intval($_POST['iloscStudent']);
$listonosz['idRepertuaru'] = intval($_SESSION['idRepertuaru']);
$listonosz['idUzytkownika'] = intval($_SESSION['idUzytkownika']);
// $listonosz['indexMiejscaTab'] = $index;
$listonosz['admin'] = $_SESSION['admin'];

$ch->setPostURL($urlBiznes, $listonosz);
$fromBiznes = $ch->exec();

if($fromBiznes['odp']){
    header('Location: index.php');
}else{
	header('Location: podsumowanie.php?id='.$wyslij['id'].'?index='.$index);
}
?>