<?php

class RezerwacjeTest extends PHPUnit_Framwork_TestCase {

    function testCena(){
        $dane = [ [20,2,1,0], [20,0,0,2], [25,1,1,2] ];

        for($i = 0; $i < count($dane); $i++){
            $result = new Rezerwacje($dane[0], $dane[1], $dane[2], $dane[3]);

            $expected = 0.00;
            $cenaBiletu = $dane[0];
            $normalne = $cenaBiletu * $dane[1];
            $uczenSenior = $cenaBiletu * 0.7 * $dane[2];
            $student = $cenaBiletu * 0.5 * $dane[3];

            $expected = round( ($normalne + $uczenSenior + $student), 2);

            $this->assertEquals($expected, $result);
        }
    }

}