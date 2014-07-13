<?php
if(isset($_GET['id']))
{
	$id_kontak=$_GET['id'];
	$isi_pesan=$_GET['isi_pesan'];
	$subjek	  =$_GET['subjek'];
	$nama	  =$_GET['nama'];
	$tgl 	  = $_GET['tgl'];
	$email	  = $_GET['email'];
	
	$query="DELETE FROM kontak WHERE id_kontak='$id_kontak'";
	$hasil=mysql_query($query)or die(mysql_error());
	if($hasil)
	{
		echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Data Kontak Berhasil Dihapus!</strong>
					<a href="?modul=kontak" class="btn btn-primary">Kembali</a>
				</div>';
	}
	else 
	{
		echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Data Kontak Gagal Terhapus!</strong>
				</div>';
	}
}
	?>

