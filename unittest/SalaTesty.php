<?php
include_once 'model/Sala.php';

use PHPUnit\Framework\TestCase;
class SalaTesty extends TestCase {
    public function test_Sala_ujemna(){
        try{
            $sala=new Sala(222232.2);
        }catch(Exception $e){
            $this->assertExuals('argument nie jest float',$e->getMessage());
        
        }
    }
    public function test_Sala_Null(){
        try{
            $sala=new Sala(null);
        }catch(Exception $e){
            $this->assertExuals('argument jest null',$e->getMessage());
        
        }
    }
    public function test_Sala_Int(){
        try{
            $sala=new Sala(2322);
        }catch(Exception $e){
            $this->assertExuals('argument nie jest array',$e->getMessage());
        
        }
    }
    

}