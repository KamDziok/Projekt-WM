<?php
include_once 'model/Rezerwacje.php';
include_once 'model/Repertuar.php';
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
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);
        $dane = [$repertuar,"Łukasz","Kwaśny",$miejsca,1,1];
        for($i = 0; $i < count($dane); $i++){
            $rez = new Rezerwacje($dane[0], $dane[1], $dane[2], $dane[3],$dane[4],$dane[5]);
            $result = $rez->obliczCene(date("N",$rez->Repertuar->data),$bilet);

            $expected = 0.00;
            $cenaBiletu = $bilet->cenyBiletow[date("N",$rez->Repertuar->data)];
            $normalne = $cenaBiletu * (count($dane[3])-$dane[4]-$dane[5]);
            $uczenSenior = $cenaBiletu / $bilet->ulgaSzkolna * $dane[4];
            $student = $cenaBiletu / $bilet->ulgaStudencka * $dane[5];

            $expected = round( ($normalne + $uczenSenior + $student), 2);

            $this->assertEquals($expected, $result);
        }
        
    }

}