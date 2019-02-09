<?php
require('fpdf/fpdf.php'); 
class PDF extends FPDF {
    function Header(){
		$date = date('d/m/Y');
        $this->Rect(10,10,277,190);
        $this->SetFont('Arial','B',10);
        $this->Ln();
        $this->Cell(190,10,'',0,0,'L');
        $this->Ln();
        $l = 10;
        $this->SetFont('Arial','B',12);
        $this->SetXY(10,15);
        $this->Cell(277,$l,utf8_decode('SEDOC - RELATÓRIOS'),'B',1,'C');
        $l=5;
        $this->SetTextColor(255,255,255);
        $this->Cell(277,$l,'Documentos Cadastrados',1,0,'C',1);
        $this->Ln();
        $this->SetFillColor(232,232,232);
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','B',8);
        $this->Cell(90,$l,utf8_decode('Tipo'),1,0,'C',1);
        $this->Cell(39,$l,utf8_decode('Recebedor'),1,0,'C',1);
        $this->Cell(19,$l,'Data',1,0,'C',1);
        $this->Cell(9,$l,'Hora',1,0,'C',1);
        $this->Cell(80,$l,utf8_decode('Especificação'),1,0,'C',1);
        $this->Cell(40,$l,utf8_decode('Responsável'),1,0,'C',1);
        $this->Ln();    }
    function Footer(){
        $this->SetXY(10,190);
        $this->Rect(10,190,277,10);
        $this->SetFont('Arial','',6);
		$this->Cell(200,7,utf8_decode('Elaborado e desenvolvido por Thiago ** E-mail:thiago.silva.tsa@gmail.com'),0,0,'L');
		$this->SetFont('Arial','',8);
        $this->Cell(77,7,utf8_decode('SEDOC - Página ').$this->PageNo().' de {nb}',0,0,'R');
    }
} 
include("conexao.php");
$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);
$sql = "select * from documentos";
$result = mysqli_query($conexao,$sql);
while($row = mysqli_fetch_array($result)) {
    $dados1 = $row["1"];
    $dados2 = $row["2"];
    $dados3 = $row["3"];
    $dados4 = $row["4"];
    $dados5 = $row["5"];
    $dados6 = $row["6"];
	$pdf->Cell(90,7, utf8_decode($dados1),1,0,"C");
    $pdf->Cell(39,7, utf8_decode($dados2),1,0,"C");
	$pdf->Cell(19,7, utf8_decode($dados3),1,0,"C");
	$pdf->Cell(9,7, utf8_decode($dados4),1,0,"C");
	$pdf->Cell(80,7, utf8_decode($dados5),1,0,"C");
	$pdf->Cell(40,7, utf8_decode($dados6),1,0,"C");
    $pdf->Ln();
}
$pdf->Output();
?>