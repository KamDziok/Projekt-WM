<?php
include_once 'model/Film.php';
include_once 'model/KolekcjaFilm.php';
use PHPUnit\Framework\TestCase;
class FilmyTest extends TestCase {
    public function testFilmu(){
 
                    $film = ['JacekPlacek', 'a', 'traratatata'];
             
                    for($i = 0; $i < count($film); $i++){
                        $this->assertIsString( $film[$i]);
                    }
          
        }
        public function testFilmuliczba(){
        
                        try{
                          $film = new Film(1, 1, 1);
                    }catch(Exception $e){
                        $this->assertEquals('argumet jest liczba', $e->getMessage());
                    }
 
        }
        public function testFilmunull(){
      
                        try{
                           $film= new Film (null, null, null);

                    }catch(Exception $e){
                        $this->assertEquals('argument nie został podany', $e->getMessage());
                    }
 
        }
        
    }
