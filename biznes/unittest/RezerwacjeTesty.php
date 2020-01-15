<?php
include_once 'model/Rezerwacje.php';
include_once 'model/Repertuar.php';
include_once 'model/Bilet.php';
include_once 'model/Walidacja.php';

use PHPUnit\Framework\TestCase;

class RezerwacjeTest extends TestCase {

    // public function testCena(){
    //     // tworzenie obiektu klasy Bilet
    //     $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
    //     $ulgaS = 0.5;
    //     $ulgaU = 0.3;
    //     $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

    //     //tworzenie obiektu klasy Repertuar
    //     $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

    //     //dane do testu klasy Rezerwacje
    //     $miejsca = [20,21,22];
    //     $dane = [[$repertuar,"Łukasz","Kwaśny",$miejsca,1,1],
    //             [$repertuar,"Kamil","Dziok",$miejsca,3,0],
    //             [$repertuar,"Krzysiek","Banaś",$miejsca,0,0],
    //             [$repertuar,"Damian","Gaworowski",$miejsca,0,2],
    //             [$repertuar,"Hubert","Jakobsze",$miejsca,0,3]];
    //     for($i = 0; $i < count($dane); $i++){
    //         $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
    //         $result = $rez->obliczCene(date("N",$rez->Repertuar->data),$bilet);

    //         $expected = 0.00;
    //         $cenaBiletu = $bilet->cenyBiletow[date("N",$rez->Repertuar->data)];
    //         $normalne = $cenaBiletu * (count($dane[$i][3])-$dane[$i][4]-$dane[$i][5]);
    //         $uczenSenior = $cenaBiletu / $bilet->ulgaSzkolna * $dane[$i][4];
    //         $student = $cenaBiletu / $bilet->ulgaStudencka * $dane[$i][5];

    //         $expected = round( ($normalne + $uczenSenior + $student), 2);

    //         $this->assertEquals($expected, $result);
    //     }
        
    // }

    public function test_nie_string(){
        // tworzenie obiektu klasy Bilet
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        // $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $miejsca = [20,21,22];
        $dane = [[$repertuar,1,"Kwaśny",$miejsca,1,1],
                [$repertuar,"Kamil",new DateTime(),$miejsca,3,0],
                [$repertuar,-1,"Banaś",$miejsca,0,0],
                [$repertuar,"Damian",2.2,$miejsca,0,2],
                [$repertuar,-1.5,"Jakobsze",$miejsca,0,3]];
        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu String', $e->getMessage());
            }
        }
    }

    public function test_miejsca_nie_array(){
        // tworzenie obiektu klasy Bilet
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        // $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $dane = [[$repertuar,"Łukasz","Kwaśny","xD",1,1],
                [$repertuar,"Kamil","Dziok",2,3,0],
                [$repertuar,"Krzysiek","Banaś",-3,0,0],
                [$repertuar,"Damian","Gaworowski",4.5,0,2],
                [$repertuar,"Hubert","Jakobsze",-5.6,0,3]];
        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu array', $e->getMessage());
            }
        }
    }

    public function test_miejsca_nie_int(){
        // tworzenie obiektu klasy Bilet
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        // $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $miejsca = [20,21,22];
        $dane = [[$repertuar,"Łukasz","Kwaśny",$miejsca,1,"haha"],
                [$repertuar,"Kamil","Dziok",$miejsca,3.5,0],
                [$repertuar,"Krzysiek","Banaś",$miejsca,0,""],
                [$repertuar,"Damian","Gaworowski",$miejsca,0,2.0],
                [$repertuar,"Hubert","Jakobsze",$miejsca,"  ",3]];
        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu int', $e->getMessage());
            }
        }
    }

    public function test_miejsca_nie_dodatnia(){
        // tworzenie obiektu klasy Bilet
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        // $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $miejsca = [20,21,22];
        $dane = [[$repertuar,"Łukasz","Kwaśny",$miejsca,-1,2],
                [$repertuar,"Kamil","Dziok",$miejsca,3,-1],
                [$repertuar,"Krzysiek","Banaś",$miejsca,-2,4],
                [$repertuar,"Damian","Gaworowski",$miejsca,0,-20],
                [$repertuar,"Hubert","Jakobsze",$miejsca,-100,3]];
        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            }catch(Exception $e){
                $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
            }
        } 
    }

    public function test_ilosc_ulg(){
        // tworzenie obiektu klasy Bilet
        $ceny = [20.0,18.0,20.0,20.0,22.0,25.0,25.0];
        $ulgaS = 0.5;
        $ulgaU = 0.3;
        // $bilet = new Bilet($ceny, $ulgaU, $ulgaS);

        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $miejsca = [20,21,22];
        $dane = [[$repertuar,"Łukasz","Kwaśny",$miejsca,2,3],
                [$repertuar,"Kamil","Dziok",$miejsca,5,1],
                [$repertuar,"Krzysiek","Banaś",$miejsca,10,10],
                [$repertuar,"Damian","Gaworowski",$miejsca,50,2],
                [$repertuar,"Hubert","Jakobsze",$miejsca,0,39]];
        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            }catch(Exception $e){
                $this->assertEquals('niewłaściwa liczba biletów ulgowych', $e->getMessage());
            }
        }
        
    }

    public function test_rezerwuj(){
        $a = fopen("miejsca.json", 'a');
        fclose($a);
        $miejsca = [1,2,3,4];
        $dane = [[1, $miejsca, 2],
                [1, $miejsca, 2],
                [1, $miejsca, 2],
                [1, $miejsca, 2],
                [1, $miejsca, 2]];
        $rez = new Rezerwacje(1, "Łukasz","Kwaśny",$miejsca,2,3);
        $b = fopen("miejsca.json", 'a');
        fclose($b);
        $this->assertEquals($b, $a);
    }
}