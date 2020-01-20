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

include_once 'curl.php';

session_start();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/repertuar/loadingAll.php';

$ch = new ClientURL();

$ch->setGetURL($url);
$rezult = $ch->exec();
$json = json_decode($rezult, TRUE);
// function rezerwoj($i){
// 	global $rezult;
// 	$_SESSION['idFilm'] = $rezult[$i]['idFilm'];
// 	$_SESSION['film'] = $rezult[$i]['film'];
// 	$_SESSION['sala'] = $rezult[$i]['sala'];
// 	$_SESSION['data'] = $rezult[$i]['data'];
// 	$_SESSION['opis'] = $rezult[$i]['opis'];
// 	header('Location: Rezerwacja.php');
// }

// $rezult[0]['idFilm'] = 0;
// $rezult[0]['film'] = "Przeminęło z wiatrem";
// $rezult[0]['sala'] = "1";
// $rezult[0]['data'] = "Data seansu: 01.01.2020";
// $rezult[0]['opis'] = "Ekranizacja powieści Margaret Mitchell. Beztroska i bogata Scarlett O'Hara wikła się w burzliwy związek z Rhettem Butlerem.";
// $rezult[1]['idFilm'] = 1;
// $rezult[1]['film'] = "Tytanic";
// $rezult[1]['sala'] = "1";
// $rezult[1]['data'] = "Data seansu: 01.01.2020";
// $rezult[1]['opis'] = "Rok 1912, brytyjski statek Titanic wyrusza w swój dziewiczy rejs do USA. Na pokładzie emigrant Jack przypadkowo spotyka arystokratkę Rose.";
// $rezult[2]['idFilm'] = 2;
// $rezult[2]['film'] = "Opowieści z Narni";
// $rezult[2]['sala'] = "1";
// $rezult[2]['data'] = "Data seansu: 01.01.2020";
// $rezult[2]['opis'] = "Podczas II wojny światowej czwórka rodzeństwa zamieszkuje na wsi w domu ekscentrycznego profesora. Dzieci odkrywają przejście przez szafę do magicznej krainy zwanej Narnią.";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title>KinoURZ</title>
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
<body id="page1">

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
					</ul>
				</div>
				<div class="row-2">
					<ul>
						<li><a href="index.php" class="active">Kino</a></li>
						<li><a href="register.php">Zarejestruj</a></li>
						<li><a href="logowanie.php">Zaloguj</a></li>
						<li><a href="contact-us.php">Kontakt</a></li>
						
					</ul>
				</div>
			</div>
<!-- CONTENT -->
			<div id="content">
				<div id="slogan">
					<div class="image png"></div>
					<div class="inside">
						<h2>Witaj<span>Na stronie KinaURZ</span></h2>
						<p class="black">Mamy zaszczyt przywitać cie na stronie KinaURZ. Poniżej znajdują sie autlnie dostępne filmy.</p>
						
					</div>
				</div>
				
				<div class="content">
					<h3><span>W repertuarze</span></h3>
					<ul class="movies">
						<?php
							foreach($json as $r => $dane){
								// echo "<li><h4>".$dane['film']."<h4><img src='images/1page-img".($dane['idFilm']+2).".jpg' alt='nie dla psa kielbasa' /><p>".$dane['opis']."</p><div class='wrapper'><a class='link3'><button id='".$r."'>Zarezerwój</button></a></div></li>";
								?> <li>
										<form action='Rezerwacja.php?id=<?php echo $dane['id_repertuaru'];?>' method='POST'>
											<h4>
												<?php echo $dane['film']['tytul'];?>
											</h4>
											<img src='images/1page-img<?php echo($dane['film']['id_filmu']+2);?>.jpg' alt='nie dla psa kielbasa' />
											<p>
											<?php echo $dane['film']['opis'];?>
											</p>
											<p></p>
											<!-- <input type='text' name='data' value='".$dane['data']."' readonly/> -->
											<div class='wrapper'>
												<input  class='login-submit' name='wyslij' type='submit' value='Zarezerwuj' />
												</span>
											</div>
										</form>
									</li>
						<?php
							}
						?>
						<li class="clear">&nbsp;</li>
						<!-- <li id="1">
							<h4>Toy Story 3</h4><img src="images/1page-img2.jpg" alt="" />
							<p>Check out Disney-Pixar's official Toy Story site, watch the <span>Toy Story 3</span> trailer, and meet new characters. Remember, no toy gets left behind!</p>
							<div class="wrapper"><a class="link3"><button>zarezerwuj</button></a></div>
						</li><br>
						<li>
							<h4>Prince of Percia: Sands of Time</h4><img src="images/1page-img3.jpg" alt="" />
							<p>A young fugitive prince and princess must stop a villain who unknowingly threatens to destroy the world with a special dagger.</p>
							<div class="wrapper"><a href="Rezerwacja.php" class="link3"><button>zarezerwuj</button></a></div>
						</li><br>
						<li class="last">
							<h4>The Twilight Saga: Eclipse</h4><img src="images/1page-img4.jpg" alt="" />
							<p>As a string of mysterious killings grips Bella is forced to choose between her love for vampire Edward and her friendship with werewolf Jacob.</p>
							<div class="wrapper"><a href="Rezerwacja.php" class="link3"><button>zarezerwuj</button></a></div>
						</li><br>
						<li>
							<h4>Toy Story 3</h4><img src="images/1page-img2.jpg" alt="" />
							<p>Check out Disney-Pixar's official Toy Story site, watch the <span>Toy Story 3</span> trailer, and meet new characters. Remember, no toy gets left behind!</p>
							<div class="wrapper"><a href="Rezerwacja.php" class="link3"><button>zarezerwuj</button></a></div>
						</li><br>
						<li>
							<h4>Toy Story 3</h4><img src="images/1page-img2.jpg" alt="" />
							<p>Check out Disney-Pixar's official Toy Story site, watch the <span>Toy Story 3</span> trailer, and meet new characters. Remember, no toy gets left behind!</p>
							<div class="wrapper"><a href="Rezerwacja.php" class="link3"><button>zarezerwuj</button></a></div>
						</li><br>
						
						<li class="clear">&nbsp;</li> -->
					</ul>
				</div>
			</div>
<!-- FOOTER -->
			<div id="footer">
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
<script type="text/javascript">

Cufon.now(); 

$(document).ready(function(){
 
 $("button").click(function(){

 $.get("skrypt.php?akcja?"+$(this));

 });

});
// $("li").click(function(){
// 	var tytul = ($(this).children("h4").text());
// });

</script>
</body>

</html>