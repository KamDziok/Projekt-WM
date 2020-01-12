<?php
include_once 'model/Sala.php';

use PHPUnit\Framework\TestCase;
class SalaTesty extends TestCase {
    public function test_Sala_ujemna(){
        $dane = [1,-2,3,4];
        try{
            $sala = new Sala($dane);
        }catch(Exception $e){
            $this->assertEquals('argument jest mniejszy od 0',$e->getMessage());
        }
    }
    public function test_Sala_nie_int(){
        $dane = [1,"2","null",3];
        try{
            $sala = new Sala($dane);
        }catch(Exception $e){
            $this->assertEquals('argument nie jest typu int',$e->getMessage());
        }
    }
    public function test_Sala_Array(){
        try{
            $sala = new Sala(2322);
        }catch(Exception $e){
            $this->assertEquals('argument nie jest typu array',$e->getMessage());
        
        }
    }
}