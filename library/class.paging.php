<?php
/**
 * Class paging untuk halaman administrator
 *
 * Untuk menggeneerate link paging halaman administrator
 */

class Paging{
	/**
	 * Mencari posisi halaman
	 */
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		} else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
	}

	/**
	 * Fungsi untuk menghitung total halaman
	 */
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	/**
	 * Fungsi untuk link halaman 1,2,3 (untuk admin)
	 */
	function navHalaman($halamanAktif, $jumlahHalaman, $route){
		$nav = "<div class=\"pagination pagination-mini pagination-centered\"><ul>";
		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jumlahHalaman; $i++){
			if ($i == $halamanAktif){
				$nav .= "<li class=\"disabled\"><a href=\"\">{$i}</a></li>";
			} else {
				@$nav .= "<li class=\"active\"><a href=\"{$_SERVER['PHP_SELF']}?r={$route}&page={$i}\">{$i}</a></li>";
			}
		}
		$nav .= "</ul></div>";
		return $nav;
	}
}