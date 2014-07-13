<?php
//session_start();
include('../konek.php');
require('../library/fpdf.php');

$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B','18');
$pdf->Image('../assets/img/logo.png',20,6,30,20);
$pdf->SetFont('Arial','B','15');
$pdf->Cell(120);
$pdf->Cell(50,8,'Restaurant Matahari Jaya',0,1,'C');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(150);
$pdf->Cell(7,8,'Kantor Pusat : Restaurant Matahari Jaya Blok. Af1 No.03 Tangerang Indonesia',0,1,'C');
$pdf->Cell(260,8,'','B');

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(200,10,'DATA ONGKOS KIRIM',0,1,'C');
$pdf->Cell(40,10,'ID Kota',0);
$pdf->Cell(100,10,'Nama Kota',0);
$pdf->Cell(100,10,'Ongkos Kirim',0);
$pdf->Ln();

$query="SELECT * FROM kota";
$sql=mysql_query($query);
while($row=mysql_fetch_array($sql))
{
	$pdf->Cell(40,5,$row['id_kota'],0);
	$pdf->Cell(100,5,$row['nama_kota'],0);
	$pdf->Cell(100,5,$row['ongkos_kirim'],0);;
$pdf->Ln();
}
$pdf->Output();
?>