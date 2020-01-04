<html>
<head>
<link rel="stylesheet" href="../stylesheet.css" type="text/css" /></head>
<body>
<?php
session_start();
mysql_connect("localhost","admin","haslo");
mysql_select_db("baza");
?>
<table align="center" >

<td cellpadding="0" cellspacing="0"   style="background:url(../images/pusta.jpg); width: 403px; height:607px" >
<br><b style="color:red; font-size: large; padding-left: 50px;" aligen="center">Aplikacja Filmowa </b><br><br>


<form method="POST" action="login.php" class="formularz">
<b style="color:red">Login:</b> <input type="text" name="login"><br>
<b style="color:red">Hasło:</b> <input type="password" name="haslo"><br>
<input type="submit" value="Zaloguj" name="loguj">
<input style="background:url(images/se23.jpg); width:100px; color:red;" type="button" value="Rejestracja" onClick="location.href='rejestracja.php';" />
<input style="background:url(images/se23.jpg); width:100px; color:red;" type="button" value="Strona glowna" onClick="location.href='../index.php';" />

</form>
</td>

</table>
</body>




</hyml>