<?php

session_start();
	
	// if (!isset($_SESSION['inicjuj']))
	// {
	// 	session_regenerate_id();
	// 	$_SESSION['inicjuj'] = true;
	// 	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	// }
	
	
	// if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
	// {
	// 	die('Proba przejecia sesji udaremniona!');	
	// }

    include_once 'curl.php';

    $url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/uzytkownik/logowanie.php';

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $login = $_POST["login"];
    $password = $_POST["password"];

    $ch = new ClientURL();

    $dataToAppi = array('login' => $login, 'password' => $password);
    $ch->setPostURL($url, $dataToAppi);
    $zaloguj = $ch->exec();

    var_dump($zaloguj);

    if($zaloguj[0] == "user nie istnieje") $_SESSION['zalogowany'] = false;
    else $_SESSION['zalogowany'] = true;

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)){
        // $_SESSION['admin'] == 0;
        // $_SESSION['login'] == "Roman";
        $_SESSION['idUzytkownika'] = $zaloguj['id_uzytkownika'];  
        $_SESSION['admin'] = $zaloguj['admin'];
        $_SESSION['login'] = $zaloguj['login'];
        $_SESSION['imie'] = $zaloguj['imie'];
        $_SESSION['nazwisko'] = $zaloguj['nazwisko'];
        $_SESSION['email'] = $zaloguj['email'];
		if($_SESSION['admin'] == 0 || $_SESSION['admin'] == 1){
			header('Location: index.php');
		}else{
			header('Location: Panel_Admina.php');
        }
        if($_SESSION['urlBool']){
            header('Location: '.$_SESSION['url']);
        }
		exit();
	}
?>