<?php
include_once 'model/Rezerwacje.php';
include_once 'model/Repertuar.php';
include_once 'model/Bilet.php';
include_once 'model/Walidacja.php';

use PHPUnit\Framework\TestCase;

class RezerwacjeTest extends TestCase {

    // public function testCena(){
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
        $miejsca = [20.1,21.1,22.2];
        $dane = [[$repertuar,"Łukasz","Kwaśny",["abc","def",3],1,0],
                [$repertuar,"Kamil","Dziok",['abc',2,'ghi'],3,0],
                [$repertuar,"Krzysiek","Banaś", [' ','123','456'],0,0],
                [$repertuar,"Damian","Gaworowski", [2,3,'456'],0,2],
                [$repertuar,"Hubert","Jakobsze", [2,3,4.5],1,1]];
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
        $miejsca = [-20,-21,-22];
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
        //tworzenie obiektu klasy Repertuar
        $repertuar = new Repertuar("bla",00,3,11,25,2019,2);

        //dane do testu klasy Rezerwacje
        $miejsca = [20,21];
        $dane = [[$repertuar,"Łukasz","Kwaśny",$miejsca,10,0],
                [$repertuar,"Kamil","Dziok",$miejsca,50,10],
                [$repertuar,"Krzysiek","Banaś",$miejsca,10,10],
                [$repertuar,"Damian","Gaworowski",$miejsca,50,20],
                [$repertuar,"Hubert","Jakobsze",$miejsca,10,39]];
        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Rezerwacje($dane[$i][0], $dane[$i][1], $dane[$i][2], $dane[$i][3],$dane[$i][4],$dane[$i][5]);
            }catch(Exception $e){
                $this->assertEquals('niewłaściwa liczba biletów ulgowych', $e->getMessage());
            }
        }
    }

    public function test_rezerwuj_2(){
        $pusty = [[1,[1,2,3,4,0]],[2,[1,2,3,4,0]]];
        $pusty = json_encode($pusty);
        file_put_contents("miejsca.json", $pusty);
        $dane = [[1, [1,3,4,5]],
                [1, [1,13,14,15]],
                [1, [11,13,14,4]],
                [1, [21,223,4,15]],
                [1, [2]]];
        for($i = 0; $i < count($dane); $i++){
            $rez = new Rezerwacje(1, "Łukasz","Kwaśny",$dane[$i][1],0,0);
            $id = $rez->rezerwuj($dane[$i][0],$dane[$i][1]);
            $this->assertEquals(-1, $id);
        }
    }

    public function test_rezerwuj(){
        $pusty = [];
        $pusty = json_encode($pusty);
        file_put_contents("miejsca.json", $pusty);
        $miejsca = [1,2,3,4];
        $dane = [[1, $miejsca],
                [2, $miejsca],
                [3, $miejsca],
                [4, $miejsca],
                [5, $miejsca]];
        for($i = 0; $i < count($dane); $i++){
            $rez = new Rezerwacje(1, "Łukasz","Kwaśny",$miejsca,0,4);
            $id = $rez->rezerwuj($dane[$i][0],$dane[$i][1]);
            $this->assertGreaterThan(-1, $id);
        }
    }
}