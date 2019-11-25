<?php
include_once 'model/Rezerwacje.php';
include_once 'model/Repertuar.php';
include_once 'model/Bilet.php';
include_once 'model/Walidacja.php';

use PHPUnit\Framework\TestCase;

class RezerwacjeTest extends TestCase {

    public function testCena(){
        // tworzenie obiektu klasy Bilet
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $miejsca = [20,21,22];
        $dane = [[$repertuar,"Łukasz","Kwaśny",$miejsca,1,1],
                [$repertuar,"Kamil","Dziok",$miejsca,3,0],
                [$repertuar,"Krzysiek","Banaś",$miejsca,0,0],
                [$repertuar,"Damian","Gaworowski",$miejsca,0,2],
                [$repertuar,"Hubert","Jakobsze",$miejsca,0,3]];
        for($i = 0; $i < count($dane); $i++){
            $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            $result = $rez->obliczCene(date("N",$rez->Repertuar->data),$bilet);

            $expected = 0.00;
            $cenaBiletu = $bilet->cenyBiletow[date("N",$rez->Repertuar->data)];
            $normalne = $cenaBiletu * (count($dane[$i][3])-$dane[$i][4]-$dane[$i][5]);
            $uczenSenior = $cenaBiletu / $bilet->ulgaSzkolna * $dane[$i][4];
            $student = $cenaBiletu / $bilet->ulgaStudencka * $dane[$i][5];

            $expected = round( ($normalne + $uczenSenior + $student), 2);

            $this->assertEquals($expected, $result);
        }
        
    }

}