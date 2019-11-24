<?php

include_once 'model/Rezerwacje.php';
include_once 'model/Bilet.php';
include_once 'model/Walidacja.php';

use PHPUnit\Framework\TestCase;

class RezerwacjeTest extends TestCase {

    public function testCena(){
        //to przyklad, jest do poprawy
        //$dane = [ [20,2,1,0], [20,0,0,2], [25,1,1,2] ];
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        $bilet = new Bilet($ceny, $ulgaU, $ulgaS);
        $miejsca = [20,21,22];
        $dane = ["Łukasz","Kwaśny",$miejsca,1,1];
        for($i = 0; $i < count($dane); $i++){
            $rez = new Rezerwacje($dane[0], $dane[1], $dane[2], $dane[3],$dane[4]);
            $result = $rez->obliczCene(5,$bilet);

            $expected = 0.00;
            $cenaBiletu = $bilet->cenyBiletow[5];
            $normalne = $cenaBiletu * (count($dane[2])-$dane[3]-$dane[4]);
            $uczenSenior = $cenaBiletu / $bilet->ulgaSzkolna * $dane[3];
            $student = $cenaBiletu / $bilet->ulgaStudencka * $dane[4];

            $expected = round( ($normalne + $uczenSenior + $student), 2);

            $this->assertEquals($expected, $result);
        }
        
    }

}