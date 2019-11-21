<?php
declare(strict_types=1);

include_once 'model/Rezerwacje.php';
//require_once 'PHPUnit/Autoload.php';

use PHPUnit\Framework\TestCase;

final class RezerwacjeTest extends TestCase {

    public function testCena(){
        //$dane = [ [20,2,1,0], [20,0,0,2], [25,1,1,2] ];
        $dane = [20,2,1,0];
        for($i = 0; $i < count($dane); $i++){
            $rez = new Rezerwacje($dane[0], $dane[1], $dane[2], $dane[3]);
            $result = $rez->cena();

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