<?php
// include_once 'curl.php';

// session_start();

// $url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/repertuar/loadingAll.php';

// $ch = new ClientURL();

// $ch->setGetURL($url);
// $rezult = $ch->exec();
if(isset($_POST['miejsca'])){
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$miejsca = $_POST['miejsca'];
	$iloscSzkolne = $_POST['iloscSzkolne'];
	$iloscStudenckie = $_POST['iloscStudent'];
}
else
{
    echo "Do not Need wheelchair access.";
}	 

$data = date("Y-m-d");

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Site Map - Site Map | Cinema - Free Website Template from Templates.com</title>
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
<body id="page6">
<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
<!-- HEADER -->
			<div id="header">
				<div class="row-1">
					<div class="fleft"><a href="index.html">Kino<span>URZ</span></a></div>
					<ul>
						<li><a href="index.php"><img src="images/icon1-act.gif" alt="" /></a></li>
						<li><a href="contact-us.php"><img src="images/icon2.gif" alt="" /></a></li>
						<li><a href=".html"><img src="images/icon3.gif" alt="" /></a></li>
					</ul>
				</div>
				<div class="row-2">
					<ul>
						<li><a href="index.php" >Kino</a></li>
						<li><a href="register.php">Stwórz Konto</a></li>
						<li><a href="logowanie.php">Zaloguj</a></li>
						<li><a href="contact-us.php">Kontakt</a></li>
						
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
								<h3>Podsumowanie <span>Rezerwacji</span></h3>
                               <h2><span>Dane Klienta:<span></h2>
						      		<p><?php echo "Pan/Pani ".$imie." ".$nazwisko; ?></p>		
								<h2><span>Zarezerwowane miejsca:<span></h2>
						      		<p><?php echo "Miejsca nr.:	   "; foreach($miejsca as $m => $dane){echo $dane.", ";} ?></p>
								<h2><span>Jakie Bilety:<span></h2>
						      		<p><?php echo "Bilety szkolne: ".$iloscSzkolne.", Biletu studencke: ".$iloscStudenckie; ?></p>		
								<h2><span>Data Sprzedaży:<span></h2>
									<p><?php echo $data; ?></p>
								<h2><span>Łączna cena</span></h2>
									<p><?php echo $cena; ?></p>
								<div class="wrapper"><a href="index.php" class="link2"><span><span>Zatwierdz rezerwacje</span></span></a></div>					  
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- FOOTER -->
			<div id="footer">
				<div class="left">
					<div class="right">
						<div class="inside">Copyright - KinoURZ<br />
							
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