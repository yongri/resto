<?php
//session_start();
include('../konek.php');
require('../library/fpdf.php');

$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B','18');
$pdf->Image('../assets/img/logo.png',30,6,30,20);
$pdf->SetFont('Arial','B','15');
$pdf->Cell(120);
$pdf->Cell(80,5,'Restaurant Matahari Jaya',0,1,'C');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(150);
$pdf->Cell(7,8,'Kantor Pusat : Restaurant Matahari Jaya Blok. Af1 No.03 Tangerang Indonesia',0,1,'C');
$pdf->Cell(280,8,'','B');

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(280,10,'LAPORAN DATA PEMBAYARAN CUSTOMER',0,1,'C');
$pdf->Cell(30,10,'No.transaksi',0);
$pdf->Cell(40,10,'Nama Member',0);
$pdf->Cell(40,10,'Pemilik Rek',0);
$pdf->Cell(40,10,'No.Rekening',0);
$pdf->Cell(40,10,'Tanggal Transfer',0);
$pdf->Cell(40,10,'Waktu Transfer',0);
$pdf->Cell(60,10,'Nominal (Dalam Rupiah)',0);
$pdf->Ln();

$query="SELECT * FROM konfirmasi a, transaksi b, member c WHERE a.id_transaksi=b.id_transaksi, b.id_member=c.id_member AND status='Lunas'";
$sql=mysql_query($query);
while($row=mysql_fetch_array($sql))
{
	$pdf->Cell(30,5,$row['id_transaksi'],0);
	$pdf->Cell(40,5,$row['nama_member'],0);
	$pdf->Cell(40,5,$row['pemilik_rek'],0);
	$pdf->Cell(40,5,$row['no_rek'],0);
	$pdf->Cell(40,5,$row['tgl_transfer'],0);
	$pdf->Cell(40,5,$row['waktu_transfer'],0);
	$pdf->Cell(60,5,$row['status'],0);
	$pdf->Cell(60,5,$row['bank_bayar'],0);
	$pdf->Cell(60,5,$row['nominal_bayar'],0);
$pdf->Ln();
}
$pdf->Output();
?>