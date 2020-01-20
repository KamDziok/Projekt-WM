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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title>Zarejestruj</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Gill_Sans_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, .link1 span, .link1');
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page2">

<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
<!-- HEADER -->
			<div id="header">
				<div class="row-1">
				<div class="fleft"><a href="index.php">Kino<span>URZ</span></a></div>
					<ul>
						
					<li><a href="index.php"><img src="images/icon1-act.gif" alt="" /></a></li>
						<li><a href="contact-us.php"><img src="images/icon2.gif" alt="" /></a></li>
						<li><a href="Panel_Pracownika.php"><img src="images/icon3.gif" alt="" /></a></li>
						
					</ul>
				</div>
				<div class="row-2">
					<ul>
						
						<li><a href="index.php" >Kino</a></li>
						<li><a href="register.php" class="active">Zarejestruj</a></li>
						<?php if(!$_SESSION['zalogowany']){?>
						<li><a href="logowanie.php">Zaloguj</a></li>
						<?php }else{?>
						<li><a href="logout.php">Wyloguj</a></li>
						<?php }?>
						<li><a href="contact-us.php">Kontakt</a></li>
						
					</ul>
				</div>
			</div>
<!-- CONTENT -->
<!-- CONTENT -->

<div id="content">
				<div id="slogan">
					<div class="image png"></div>
					<div class="inside">
			
					

						
					
					
					<form action="regi.php" method="POST">

  <input name="login" type="login" class="login-username" autofocus="true" required="true" placeholder="Login" />
  <input name="imie" type="login" class="login-username" autofocus="true" required="true" placeholder="Imię" />
  <input name="nazwisko" type="login" class="login-username" autofocus="true" required="true" placeholder="Nazwisko" />
  <input name="mail" type="login" class="login-username" autofocus="true" required="true" placeholder="Mail" />
  <input name="passwordOne" type="password" class="login-password" required="true" placeholder="Hasło" />
  <input name="passwordTwo" type="password" class="login-password" required="true" placeholder="Powtórz hasło" />
  <input type="submit" name="zarejestruj" value="zarejestruj" class="login-submit" />
</form>

</div></div></div><div>
				
				


<!-- FOOTER -->
<div id="footer2">
				<div class="left">
					<div class="right">
						<div class="inside">Copyright - Grupa laboratoryjna nr 2, projektowa nr 1<br>
							Krzysztof Banaś, Kamil Dziok, Damian Gaworowski, Hubert Jakobsze, Łukasz Kwaśny
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>