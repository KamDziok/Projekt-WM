<?php
include_once 'model/Repertuar.php';
include_once 'model/Walidacja.php';

use PHPUnit\Framework\TestCase;

class RepertuarTest extends TestCase {

    public function testRepertuaru_film_nie_string(){
        $dane = [[1,18,30,11,26,2019,2],
                [2,19,0,11,26,2019,1],
                [-5,12,30,11,27,2019,2],
                [0.5,13,45,11,27,2019,1],
                [new DateTime() ,15,00,11,27,2019,2]];

        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu String', $e->getMessage());
            }
        }
    }

    public function testRepertuaru_data_nie_dziala(){
        $dane = [["Prestiż",30,30,11,26,2019,2],
                ["American beauty",19,60,11,26,2019,1],
                ["Pulp fiction",12,30,19,27,2019,2],
                ["Gladiator",13,45,11,77,2019,1],
                ["Gwiezdnw wojny 4",15,00,11,27,-2019,2]];

        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest data', $e->getMessage());
            }
        }
    }

    public function testRepertuaru_sala_nie_int(){
        $dane = [["Więzień nienawiści",10,30,11,26,2019,2.5],
                ["Gran Torino",19,0,11,26,2019,"1"],
                ["Złap mnie jeśli potrafisz",12,30,11,27,2019,2.6],
                ["Przełęcz ocalonych",13,45,11,27,2019,"1"],
                ["Ruchomy zamek Hauru",15,00,11,27,2019,"2"]];

        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu int', $e->getMessage());
            }
        }
    }

    public function testRepertuaru_sala_nie_dodatnia(){
        $dane = [["Okruchy dnia",10,30,11,26,2019,-2],
                ["Igrzyska śmierci",19,0,11,26,2019,-1],
                ["Władca Pierścieni",12,30,11,27,2019,-2],
                ["Kubo i dwie struny",13,45,11,27,2019,-1],
                ["Gwiezdnw wojny 4",15,00,11,27,2019,-2]];

        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
            }catch(Exception $e){
                $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
            }
        }
    }

    public function testRepertuaru_film_jest_null(){
        $dane = [[null,10,30,11,26,2019,2],
                [null,19,0,11,26,2019,1],
                [null,12,30,11,27,2019,2],
                [null,13,45,11,27,2019,1],
                [null,15,00,11,27,2019,2]];

        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
            }catch(Exception $e){
                $this->assertEquals('argument nie został podany', $e->getMessage());
            }
        }
    }

    // public function testRepertuaru_get_film(){
    //     $dane = [["Buntownik z wyboru",18,30,11,26,2019,2],
    //             ["Leon zawodowiec",19,0,11,26,2019,1],
    //             ["Piękny umysł",12,30,11,27,2019,2],
    //             ["Lot nad kukułczym gniazdem",13,45,11,27,2019,1],
    //             ["Mechaniczna pomarancza" ,15,00,11,27,2019,2]];

    //     for($i = 0; $i < count($dane); $i++){
    //         try{
    //             $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
    //         }catch(Exception $e){
    //             $this->assertEquals($dane[$i][0], $rez->getName());
    //         }
    //     }
    // }

    // public function testRepertuaru_get_data(){
    //     $dane = [["Fight club",18,30,11,26,2019,2],
    //             ["Niezgodna",19,0,11,26,2019,1],
    //             ["Zbuntowana",12,30,11,27,2019,2],
    //             ["Wierna",13,45,11,27,2019,1],
    //             ["Ogniem i mieczem" ,15,00,11,27,2019,2]];

    //     for($i = 0; $i < count($dane); $i++){
    //         try{
    //             $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
    //         }catch(Exception $e){
    //             $this->assertEquals(mktime($dane[$i][1], $dane[$i][2], 0, $dane[$i][3], $dane[$i][4], $dane[$i][5]), $rez->getDate());
    //         }
    //     }
    // }

    // public function testRepertuaru_get_sala(){
    //     $dane = [["Królestwo niebieskie",18,30,11,26,2019,2],
    //             ["Twój na zawsze",19,0,11,26,2019,1],
    //             ["Wyspa tajemnic",12,30,11,27,2019,2],
    //             ["Joe Black",13,45,11,27,2019,1],
    //             ["Odyseja kosmiczna" ,15,00,11,27,2019,2]];

    //     for($i = 0; $i < count($dane); $i++){
    //         try{
    //             $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
    //         }catch(Exception $e){
    //             $this->assertEquals($$dane[$i][6], $rez->getSala());
    //         }
    //     }
    // }
}
