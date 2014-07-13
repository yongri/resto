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
$pdf->Cell(280,10,'LAPORAN DATA MENU',0,1,'C');
$pdf->Cell(30,10,'ID Menu',0);
$pdf->Cell(70,10,'Nama Menu',0);
$pdf->Cell(50,10,'Harga Menu(Rp)',0);
$pdf->Cell(30,10,'Stok',0);
$pdf->Cell(30,10,'Kategori',0);
$pdf->Ln();

$query="SELECT * FROM Menu";
$sql=mysql_query($query);
while($row=mysql_fetch_array($sql))
{
	$pdf->Cell(30,5,$row['id_menu'],0);
	$pdf->Cell(70,5,$row['nama_menu'],0);
	$pdf->Cell(50,5,$row['harga_menu'],0);
	$pdf->Cell(30,5,$row['stok_menu'],0);
	$pdf->Cell(30,5,$row['kategori'],0);
$pdf->Ln();
}
$pdf->Output();
?>