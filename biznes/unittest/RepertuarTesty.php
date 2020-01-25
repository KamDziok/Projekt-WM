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
        $dane = [["Prestiż",10,30,11,26,2019,2.5],
                ["American beauty",19,0,11,26,2019,"1"],
                ["Pulp fiction",12,30,11,27,2019,2.6],
                ["Gladiator",13,45,11,27,2019,"1"],
                ["Gwiezdnw wojny 4",15,00,11,27,2019,"2"]];

        for($i = 0; $i < count($dane); $i++){
            try{
                $rez = new Repertuar($dane[$i][0],$dane[$i][1],$dane[$i][2],$dane[$i][3],$dane[$i][4],$dane[$i][5],$dane[$i][6]);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu int', $e->getMessage());
            }
        }
    }

    public function testRepertuaru_sala_nie_dodatnia(){
        $dane = [["Prestiż",10,30,11,26,2019,-2],
                ["American beauty",19,0,11,26,2019,-1],
                ["Pulp fiction",12,30,11,27,2019,-2],
                ["Gladiator",13,45,11,27,2019,-1],
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
}
