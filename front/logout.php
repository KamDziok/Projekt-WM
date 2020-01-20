<?php
session_start();
session_destroy();

session_start();
	
	if (!isset($_SESSION['inicjuj']))
	{
		session_regenerate_id();
		$_SESSION['inicjuj'] = true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	}
	
	
	if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
	{
		die('Proba przejecia sesji udaremniona!');	
	}

$_SESSION['zalogowany'] = FALSE;
header('Location: index.php');

?>