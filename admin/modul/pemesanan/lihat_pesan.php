<div class="secondary-masthead">
	<div class="container">
		<ul class="breadcrumb">
			<li>
			<a href="#">Dashboard</a> <span class="divider">/</span>
			</li>
			<li class="active">Pemesanan</li> <span class="divider">/</span>
			</li>
			<li class="active">Data</li>
		</ul>		
	</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span6">
						<legend><strong>Lihat Data Pemesanan</strong></legend>
				</div>
					<div class="span6 listing-buttons">
						<a href="?modul=pemesanan" class="btn btn-primary">Kembali</a>
					</div>
	<div class="span12">
	<?php 
	$query=mysql_query("SELECT * FROM transaksi a, member b, kota c WHERE a.id_member = b.id_member AND a.id_kota=c.id_kota AND id_transaksi='".$_GET['id']."'")or die(mysql_error());
		
		while($data=mysql_fetch_array($query))
		{
		echo"<div class=span8 tengah>";
		$id_transaksi		=$data['id_transaksi'];
		$status_transaksi	=$data['status_transaksi'];
		$tanggal		=$data['tgl_transaksi'];
		$jam			=$data['jam_transaksi'];
		$alamat_kirim	=$data['alamat_kirim'];
		$nama_member	=$data['nama_lengkap'];
		$nama_kota		=$data['nama_kota'];
		echo"<table>
			<tr>
			<td>Id transaksi</td><td> :</td><td> $id_transaksi</td>
			</tr>
			<tr>
			<td>Status transaksi </td><td>:</td><td> $status_transaksi</td>
			</tr>
			<tr>
			<td>Tanggal</td><td> :</td><td>   $tanggal</td>
			</tr>
			<tr>
			<td>Jam </td><td> :</td><td>  $jam</td>
			</tr>
			<tr>
			<td>Alamat Kirim </td><td> :</td><td>$alamat_kirim</td>
			</tr> 
			<tr>
			<td>Nama Member</td><td> :</td><td>$nama_member </td>
			</tr> 
			<tr>
			<td>Nama Kota</td><td> :</td><td>$nama_kota </td>
			</tr> 
			</table>
		</div>";
}


?>
	</div>
