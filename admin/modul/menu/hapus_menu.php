<?php
if(isset($_GET['id']))
{
	$id_menu			=$_GET['id'];
	$kategori			=$_GET['kategori'];
	$nama_menu			=$_GET['nama_menu'];
	$keterangan_menu	=$_GET['keterangan_menu'];
	$harga_menu			=$_GET['harga_menu'];
	$stok_menu			=$_GET['stok_menu'];
	$gambar_menu		=$_GET['gambar_menu'];
	
	$query="DELETE FROM menu WHERE id_menu='$id_menu'";
	$hasil=mysql_query($query)or die(mysql_error());
	if($hasil)
	{
		echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Data Produk Berhasil Dihapus!</strong><br>
				<a href="?modul=menu" class="btn btn-primary">Kembali</a>
				</div>';
	}
	else 
	{
		echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Data menu Gagal Terhapus!</strong>
				</div>';
	}
}
?>

