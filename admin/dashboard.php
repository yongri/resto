<?php 
session_start();
if(empty($_SESSION['username'])) {
	header("Location:login.php");
}
include "../konek.php";
include "header.php";
switch ($_GET['modul']) :
	default :
	case 'home' :
		include "home.php";
		break;
	case 'menu' :
		include "modul/menu/index.php";
		break;
	case 'kategori' :
		include "modul/kategori/index.php";
		break;
	case 'pemesanan' :
		include "modul/pemesanan/index.php";
		break;
	case 'member' :
		include "modul/member/index.php";
		break;
	case 'konfirmasi';
		include "modul/konfirmasi/index.php";
		break;
	case 'laporan' :
		include "modul/laporan/index.php";
		break;
	case 'kontak' :
		include "modul/kontak/index.php";
		break;
	case 'ongkos_kirim' :
		include "modul/ongkos_kirim/index.php";
		break;
endswitch;
include "footer.php"; 

 ?>