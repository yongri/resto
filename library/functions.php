<?php
/**
 * Common function to use in this apps
 *
 */
 
/**
 * Convert format tanggal menjadi human readable
 */
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
/**
 * Fungsi untuk upload gambar
 *
 * @param string nama gambar unik hasil generate
 * @param string lokasi temporari dari gambar
 */
function uploadImage($fupload_name,$lokasi,$tipe)
{
	//direktori gambar
	$vdir_upload = 'files/';
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($lokasi, $vfile_upload);

	//identitas file asli
	if ($tipe == 'image/jpeg' || $tipe == 'image/pjpeg')
		$im_src = imagecreatefromjpeg($vfile_upload);
	elseif ($tipe == 'image/gif')
		$im_src = imagecreatefromgif($vfile_upload);
	elseif ($tipe == 'image/png')
		$im_src = imagecreatefrompng($vfile_upload);
	
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 110 pixel
	//Set ukuran gambar hasil perubahan
	$dst_width = 140;
	$dst_height = ($dst_width/$src_width)*$src_height;

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	//Simpan gambar
	if ($tipe == 'image/jpeg' || $tipe == 'image/pjpeg')
		imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
	elseif ($tipe == 'image/gif')
		imagegif($im,$vdir_upload . "small_" . $fupload_name);
	elseif ($tipe == 'image/png')
		imagepng($im,$vdir_upload . "small_" . $fupload_name);
  
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}

function uploadFile($fupload_name)
{
	//direktori file
	$vdir_upload = "files/";
	$vfile_upload = $vdir_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}