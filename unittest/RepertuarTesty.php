<?php
include_once 'model/Repertuar.php';
use PHPUnit\Framework\TestCase;
class RepertuarTest extends TestCase {
    public function testRepertuaru(){
   $film="co i jak";
   $data=mktime(12, 31, 0, 2, 1, 1999);
   $sala="1";
   $da = new DateTime();
   $re = new Repertuar($film, $data, $sala);
       $this->assertInstanceOf($data, $da);
       $this->assertInstanceOf($film, $re);
    }
        
    }
