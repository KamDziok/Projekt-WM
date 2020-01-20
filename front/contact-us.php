<?php
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title>Kontakt</title>
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
<body id="page5">

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
						<li><a href="register.php">Zarejestruj</a></li>
						<li><a href="logowanie.php" >Zaloguj</a></li>
						<li><a href="contact-us.php" class="active">Kontakt</a></li>
						
					</ul>
				</div>
			</div>
<!-- CONTENT -->
			<div id="content">
				<div class="line-hor"></div>
				<div class="box">
					<div class="border-right">
						<div class="border-left">
							<div class="inner">
								<h3>Nasze <span>Dane</span></h3>
								<div class="address">
									<div class="fleft"><span>Adres:</span>Rzeszów Podwisłocze 54<br />
										<span>Kraj:</span>Polska<br />
										<span>Tel:</span>+354 5635600<br />
										<span>Fax:</span>+354 5635610</div>
									<div class="extra-wrap"><span>info:</span><br />
										Zapraszamy do kina, bilety można rezerować poprzez strone internetową oraz osobiście w kasach biletowych. W razie pytań prosimy o wysłanie poniższego formularza.</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<!-- 			<div class="content">
					<h3>Kontakt </span></h3>
					<form id="contacts-form" action="">
						<fieldset>
						<div class="field"><label>Twoje imie:</label><input type="text" value=""/></div>
						<div class="field"><label>Twój E-mail:</label><input type="text" value=""/></div>
						<div class="field"><label>Twoja Strona:</label><input type="text" value=""/></div>
						<div class="field"><label>Twoja Wiadomość:</label><textarea cols="1" rows="1"></textarea></div>
						<div class="wrapper">
							<a href="#" class="link2" onclick="document.getElementById('contacts-form').submit()">	
								<span>
									<span>Wyślij</span>
								</span>
							</a>
						</div>
						</fieldset>
					</form>
				</div>
			</div>-->
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
