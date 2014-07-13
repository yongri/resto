<?php

	$id_kota=$_GET['id'];
	$nama_kota=$_GET['nama_kota'];
	$ongkos_kirim=$_GET['ongkos_kirim'];

	$query="DELETE FROM kota WHERE id_kota='$id_kota'";
	$hasil=mysql_query($query)or die(mysql_error());
	if($hasil)
	{
		echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Data Ongkos Kirim Berhasil Dihapus!</strong>
					<a href="?modul=ongkos_kirim" class="btn btn-primary">Kembali</a>
				</div>';
	}
	else 
	{
		echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Data Ongkos Kirim Gagal Terhapus!</strong>
				</div>';
	}
	?>

