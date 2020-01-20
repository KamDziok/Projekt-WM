<?php

session_destroy();
$_SESSION['zaloguj'] = FALSE;
header('Location: index.php');

?>