<?php

session_destroy();
$_SESSION['zalogowany'] = FALSE;
header('Location: index.php');

?>