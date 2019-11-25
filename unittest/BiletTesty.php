<?php
include_once 'model/Bilet.php';

use PHPUnit\Framework\TestCase;

class BiletTesty extends TestCase{

    //cenaBiletu

    public function testBilet_cena_biletu_ujemna(){
        try{
            $bilet = new Bilet([-20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], 0, 0);
        }catch(Exception $e){
        $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
        }
    }

    public function testBilet_cena_biletu_string(){
        try{
            $bilet = new Bilet('-20.1, 0.1', 0, 0);
        }catch(Exception $e){
        $this->assertEquals('argument nie jest typu array', $e->getMessage());
        }
    }

    public function testBilet_cena_biletu_int(){
        try{
            $bilet = new Bilet(20, 0, 0);
        }catch(Exception $e){
        $this->assertEquals('argument nie jest typu array', $e->getMessage());
        }
    }

    public function testBilet_cena_biletu_tablica_za_mala(){
        try{
            $bilet = new Bilet([20.0, 0.1], 0, 0);
        }catch(Exception $e){
        $this->assertEquals('tablica nie ma 7 elemwntow', $e->getMessage());
        }
    }

    //ulgaStudent

    public function testBilet_ulga_student_ujemna(){
        try{
            $bilet = new Bilet([20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], -1.0, 0);
        }catch(Exception $e){
        $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
        }
    }
    
    public function testBilet_ulga_student_wieksza_od_1(){
        try{
            $bilet = new Bilet([20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], 0.5, 3.0);
        }catch(Exception $e){
        $this->assertEquals('argument jest wiekszy od 1', $e->getMessage());
        }
    }

    public function testBilet_ulga_student_string(){
        try{
            $bilet = new Bilet([20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], 0.3, '0.5');
        }catch(Exception $e){
        $this->assertEquals('argument nie jest typu float', $e->getMessage());
        }
    }

    //ulgaSzkolna

    public function testBilet_ulga_szkolna_ujemna(){
        try{
            $bilet = new Bilet([20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], 0.3, -0.5);
        }catch(Exception $e){
        $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
        }
    }
    
    public function testBilet_ulga_szkolna_wieksza_od_1(){
        try{
            $bilet = new Bilet([20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], 3.0, 0.5);
        }catch(Exception $e){
        $this->assertEquals('argument jest wiekszy od 1', $e->getMessage());
        }
    }

    public function testBilet_ulga_szkolna_string(){
        try{
            $bilet = new Bilet([20.0, 0.1, 30.0, 21.0, 24.5, 22.0, 10.0], '0.3', 0.5);
        }catch(Exception $e){
        $this->assertEquals('argument nie jest typu float', $e->getMessage());
        }
    }

    //zmianaCen

    public function testBilet_zmianaCen(){
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaCen([21.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0]);
        $this->assertInstanceOf(Bilet::class,$bilet);
    }

    public function testBilet_zmianaCen_tablica_za_mala(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaCen([21.0, 21.1, 22.0, 21.0, 22.5, 25.0]);
        }catch(Exception $e){
            $this->assertEquals('tablica nie ma 7 elemwntow', $e->getMessage());
        }
    }

    public function testBilet_zmianaCen_string(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaCen('21.0, 21.1, 22.0, 21.0, 22.5, 25.0');
        }catch(Exception $e){
            $this->assertEquals('argument nie jest typu array', $e->getMessage());
        }
    }

    public function testBilet_zmianaCen_int(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaCen(1);
        }catch(Exception $e){
            $this->assertEquals('argument nie jest typu array', $e->getMessage());
        }
    }

    //zmianaUlgi

    public function testBilet_zmianaUlgi(){
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi(0.37, 0.51);
        $this->assertInstanceOf(Bilet::class,$bilet);
    }

    public function testBilet_zmianaUlgi_szkolna_string(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi('0.37', 0.51);
        }catch(Exception $e){
            $this->assertEquals('argument nie jest typu float', $e->getMessage());
        }
    }

    public function testBilet_zmianaUlgi_studencka_string(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi(0.37, '0.51');
        }catch(Exception $e){
            $this->assertEquals('argument nie jest typu float', $e->getMessage());
        }
    }

    public function testBilet_zmianaUlgi_szkolna_int(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi(3.1, 0.5);
        }catch(Exception $e){
            $this->assertEquals('argument jest wiekszy od 1', $e->getMessage());
        }
    }

    public function testBilet_zmianaUlgi_student_int(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi(0.37, 5.1);
        }catch(Exception $e){
            $this->assertEquals('argument jest wiekszy od 1', $e->getMessage());
        }
    }

    public function testBilet_zmianaUlgi_szkolna_ujemna(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi(-3.1, 0.5);
        }catch(Exception $e){
            $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
        }
    }

    public function testBilet_zmianaUlgi_student_ujemna(){
        try{
        $bilet = new Bilet([20.0, 21.1, 22.0, 21.0, 22.5, 25.0, 25.0], 0.3, 0.5);
        $bilet = $bilet->zmianaUlgi(0.37, -5.1);
        }catch(Exception $e){
            $this->assertEquals('argument jest mniejszy od 0', $e->getMessage());
        }
    }

    
}