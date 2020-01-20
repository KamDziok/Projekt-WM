<?php
$url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/repertuar/read_single.php';
$urlBiznes = 'http://localhost:8080/WM/projekt/Projekt-WM/biznes/instruction/rezerwuj.php';

$ch = new ClientURL();

$wyslij[] = $_GET['id'];

$ch->setPostURL($url, $wyslij);
$rezult = $ch->exec();

$listonosz['data'] = $result[''];//tytul
$listonosz['godz'] = $result[''];
$listonosz['min'] = $result[''];
$listonosz['miesiac'] = $result[''];
$listonosz['dzien'] = $result[''];
$listonosz['rok'] = $result[''];
$listonosz['idSali'] = $result[''];
$listonosz['imie'] = $_POST['imie'];
$listonosz['nazwisko'] = $_POST['nazwisko'];
$listonosz['miejsca'] = $_POST['miejsca'];
$listonosz['iloscUczen'] = $_POST['iloscUczen'];
$listonosz['iloscStudent'] = $_POST['iloscStudent'];
$listonosz['idRepertuaru'] = $wyslij['id'];
$listonosz['idUzytkownika'] = $_SESSION['id'];
$listonosz['indexMiejscaTab'] = ;
$listonosz['admin'] = ;

$ch->setPostURL($urlBiznes, $listonosz);
$fromBiznes = $ch->exec();

if($fromBiznes[0]){
	$cena = $fromBiznes['cena'];
	$index = $fromBiznes['indexTabeliMiejsca'];
}else{
	header('Location: Rezerwacja.php');
}
?>