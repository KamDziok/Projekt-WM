<?php
include_once 'model/Aktualnosci.php';

use PHPUnit\Framework\TestCase;
class AktualnosciTest extends TestCase {
    public function testAktualnosci(){
        $wiadomosci="Wiadomości ze świata filmów:/nTest/Test";

        $aktualnosci = new Aktualnosci($wiadomosci);
        $this->assertIsString('string',$wiadomosci);

    }
}