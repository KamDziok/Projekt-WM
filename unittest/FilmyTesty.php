<?php
include_once 'model/Film.php';
include_once 'model/KolekcjaFilm.php';
use PHPUnit\Framework\TestCase;
class FilmyTest extends TestCase {
    public function testFilmu(){
        $tytul="jacekPlacek";
        $rezyser="a ktoœ";
        $opis=" traratatata";
        $film = new Film($tytul, $rezyser, $opis);
 
            $expected = [$tytul, $rezyser, $opis];
         $this->assertInternalType('String', $expected);
        }
        
    }
