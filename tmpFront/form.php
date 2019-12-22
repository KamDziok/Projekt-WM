<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    try{
    include_once 'curl.php';
    include_once './model/User.php';
    $ch = new ClientURL();

    $user = new User();
    $user->imie = $_POST['username'];
    $user->haslo = $_POST['password'];
    $array = array();
    array_push($array, $user);
    $json = json_encode($array);

    $url = 'http://localhost:8080/WM/git/Projekt-WM/biznes/tmp/create.php';
    $ch->setPostURL($url, $json);
    $ch->exec();

    header("Location: index.php");
    }catch(Exception $e){
        echo $e->getMessage;
    }
}
?>
<div id="panel">
    <form method='POST' action='form.php'>
        <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username">
        <label for="password">Hasło:</label>
            <input type="password" id="password" name="password">
        <div id="lower">
            <input type="submit" value="Login">
        </div>
    </form>
</div>