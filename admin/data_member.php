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
$pdf->Cell(10,5,'Kantor Pusat :Restaurant Matahari Jaya Blok. Af1 No.03 Tangerang Indonesia ',0,1,'C');
$pdf->Cell(270,8,'','B');

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B','12');
$pdf->Cell(280,10,'LAPORAN DATA MEMBER',0,1,'C');
$pdf->SetFont('Arial','B','10');
$pdf->Cell(20,10,'ID Member',0);
$pdf->Cell(30,10,'Nama',0);
$pdf->Cell(50,10,'Alamat',0);
$pdf->Cell(30,10,'Kota',0);
$pdf->Cell(70,10,'Email',0);
$pdf->Cell(30,10,'No.Telpon',0);
$pdf->Ln();

$query="SELECT * FROM member a , kota b WHERE a.id_kota = b.id_kota";
$sql=mysql_query($query);
while($row=mysql_fetch_array($sql))
{
	$pdf->Cell(20,5,$row['id_member'],0);
	$pdf->Cell(30,5,$row['nama_lengkap'],0);
	$pdf->Cell(50,5,$row['alamat'],0);
	$pdf->Cell(30,5,$row['nama_kota'],0);
	$pdf->Cell(70,5,$row['email'],0);
	$pdf->Cell(30,5,$row['telpon'],0);
$pdf->Ln();
}
$pdf->Output();
?>