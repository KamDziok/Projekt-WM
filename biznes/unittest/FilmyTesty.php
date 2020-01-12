<?php
include_once 'model/Film.php';
include_once 'model/KolekcjaFilm.php';

use PHPUnit\Framework\TestCase;

class FilmyTest extends TestCase {

        public function testFilmuliczba(){
            try{
                $film = new Film(1, -1, 1.5);
            }catch(Exception $e){
                $this->assertEquals('argument nie jest typu String', $e->getMessage());
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
