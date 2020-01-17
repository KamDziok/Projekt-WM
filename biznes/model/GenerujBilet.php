<?php
require "./../fpdf.php";
include_once 'Bilet.php';
include_once 'Sala.php';
include_once 'Repertuar.php';


class GenerujBilet extends FPDF{
    var $imie;
    var $nazwisko;
    var $miejsca;
    var $iloscUczenSenior;
    var $iloscStudent;
    var $sala;
    var $film;

    public function __construct($imie, $nazwisko, $miejsca, $iloscUczenSenior, $iloscStudent,$sala,$film){
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->miejsca = $miejsca;
        $this->iloscUczenSenior = $iloscUczenSenior;
        $this->iloscStudent = $iloscStudent;
        $this->sala = $sala;
        $this->film = $film;
    }
    
    function header(){
        // $this->Image('img_z_logiem_kina.png' ,10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'BILET KINOWY',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'Dane Kupujących',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Strona' .$this->PageNo().'/{nb}',0,0,'C');               
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'Imie',1,0,'C');
        $this->Cell(40,10,'Nazwisko',1,0,'C');
        $this->Cell(40,10,'Miejsce',1,0,'C');
        $this->Cell(60,10,'Ulgowy',1,0,'C');
        $this->Cell(36,10,'Zwykly',1,0,'C');
        $this->Cell(30,10,'Sala',1,0,'C');
        $this->Cell(50,10,'Film',1,0,'C');
        $this->Ln();
    }
    function mainTable(){
        $this->SetFont('Times','',12);
        
        $this->Cell(20,10,$this->imie,1,0,'C');
        $this->Cell(40,10,$this->nazwisko,1,0,'C');
        $this->Cell(40,10,$this->miejsca,1,0,'C');
        $this->Cell(60,10,$this->iloscUczenSenior,1,0,'C');
        $this->Cell(36,10,$this->iloscStudent,1,0,'C');
        $this->Cell(30,10,$this->sala,1,0,'C');
        $this->Cell(50,10,$this->imie,1,0,'C');
        $this->Ln();
    }
}
?>