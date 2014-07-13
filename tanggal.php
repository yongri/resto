<?php
function tgl_indo($tgl)
{
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

/**
 * Get bulan dalam format string "januari"
 */
function getBulan($bln)
{
	switch ($bln)
	{
		case 1: 
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
function hari_indo($d)
{
	switch ($d)
	{
		case 'Sun':
			return 'Minggu';
			break;
		case 'Mon':
			return 'Senin';
			break;
		case 'Tue':
			return 'Selasa';
			break;
		case 'Wed':
			return 'Rabu';
			break;
		case 'Thu':
			return 'Kamis';
			break;
		case 'Fri':
			return 'Jumat';
			break;
		case 'Sat':
			return 'Sabtu';
			break;
		
		
	
	}
} 
$hari=date('D');
$tgl=date('Y').'-'.date('m').'-'.date('d'); 
$jam=date('H:i:a');
echo hari_indo($hari).', '.tgl_indo($tgl).' '; 
echo $jam;

?>