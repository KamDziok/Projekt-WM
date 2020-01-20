<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include_once 'curl.php';

session_start();

$url = 'http://localhost:8080/WM/projekt/Projekt-WM/loadingPages/repertuar/loadingAll.php';

$ch = new ClientURL();

// $ch->setPostURL($url,$wyslij);
// $rezult = $ch->exec();

use phpDocumentor\Reflection\Types\String_;

if(isset($_POST['film'])) 
    $film = $_POST['film'];

$liczbaMiejscRzedu = 14;    //te dane trzeba z kads wziac
$liczbaRzedow = 10;

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>KinoURZ REZERWACJA</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
			
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //fonts -->
</head>

<body onload="onLoaderFunc()">
    <h1>Wybór miejsc filmu <?php echo $film; ?></h1>
    <form action="podsumowanie.php" method="post" class="container">
        <div class="w3ls-reg">
            <!-- input fields -->
            <div class="inputForm">
                <h2>Wypełnij pola i wybierz swoje miejsca</h2>
                <div class="mr_agilemain">
                    <div class="agileits-left">
                        <label> Imię i nazwisko
                            <span>*</span>
                        </label>
                        <input type="text" name="imie" id="Username" required>
                        <input type="text" name="nazwisko" id="Username" required>
                    </div>
                    <div class="agileits-right">
                        <label> Liczba miejsc
                            <span>*</span>
                        </label>
                        <input type="number" name="iloscMiejsc" id="Numseats" required min="1">
                    </div>
                </div>
				<div>
                    <label>Bilety ulgowe studenckie</label>
                        <input type="number" name="iloscStudent" id="student" min="0">
                    <label>Bilety ulgowe szkolne</label>
                        <input type="number" name="iloscSzkolne" id="szkolny" min="0">
                </div>
                <div onclick="takeData()">Wybierz</div>
            </div>
            <!-- //input fields -->
          
            <ul class="seat_w3ls">
                <li class="smallBox greenBox">Wybrane siedzenia</li>

                <li class="smallBox redBox">Zarezerwowane siedzenia</li>

                <li class="smallBox emptyBox">Puste siedzenia</li>
            </ul>
            
            <div class="seatStructure txt-center" style="overflow-x:auto;">
                <table>
                    <?php
                        for($j = 0; $j < $liczbaRzedow; $j++){
                            echo "<tr>";
                                for($i = 0; $i < $liczbaMiejscRzedu; $i++){
                                    echo "<td><input type='checkbox' name='miejsca[]' class='seats' value='".($j*10+$i)."'></td>";
                                }
                            echo "</tr>";
                        }
                    ?>
                </table>
                <div class="screen">
                    <h2 class="wthree">EKRAN KINA</h2>
                </div>
                
                <div class="button"><a href="index.php" class="link2"><span><span>Wróc</span></span></a></div>
                <!-- prosze mi wlaczyc <input type="submit"> -->
		        <div class="wrapper"><a class="link2"><span><input type="submit" value="Podsumowanie" /></span></a></div>    
            </div>
            <!-- //seat layout -->
            <!-- details after booking displayed here -->
            <!-- //details after booking displayed here -->
            <div class="copy-wthree">
                <p>© 2020 by KinoURZ</p>
            </div>
    </form>

    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for seat selection -->
    <script>

        function onLoaderFunc() {
            $(".seatStructure *").prop("readonly", true);
            $(".displayerBoxes *").prop("readonly", true);
        }

        function takeData() {
            if ($("#Username").val().length == 0 || $("#Numseats").val().length == 0 || parseInt($("#szkolny").val()) + parseInt($("#student").val()) > parseInt($("#Numseats").val())) {
                alert("podaj wszystkie dane lub zmień ilość ulg (nie mogą przekraczać liczby miejsc)");
            } else {
                $(".inputForm *").prop("readonly", true);
                $(".seatStructure *").prop("readonly", false);
                document.getElementById("notification").innerHTML =
                    "<b style='margin-bottom:0px;background:#ff9800;letter-spacing:1px;'>Please Select your Seats NOW!</b>";
            }
        }


        function updateTextArea() {

            if ($("input:checked").length == ($("#Numseats").val())) {
                $(".seatStructure *").prop("disabled", true);

                var allNameVals = [];
                var allNumberVals = [];
                var allSeatsVals = [];

                //Storing in Array
                allNameVals.push($("#Username").val());
                allNumberVals.push($("#Numseats").val());
                $('#seatsBlock :checked').each(function () {
                    allSeatsVals.push($(this).val());
                });
            } else {
                alert("Please select " + ($("#Numseats").val()) + " seats")
            }
        }


        function myFunction() {
            alert($("input:checked").length);
        }

        /*
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        */


        $(":checkbox").click(function () {
            if ($("input:checked").length == ($("#Numseats").val())) {
                $(":checkbox").prop('disabled', true);
                $(':checked').prop('disabled', false);
            } else {
                $(":checkbox").prop('disabled', false);
            }
        });
    </script>
    <!-- //script for seat selection -->
</body>

</html>