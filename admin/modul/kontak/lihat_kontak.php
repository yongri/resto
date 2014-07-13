<div class="secondary-masthead">
	<div class="container">
		<ul class="breadcrumb">
			<li>
			<a href="#">Dashboard</a> <span class="divider">/</span>
			</li>
			<li class="active">Member</li> <span class="divider">/</span>
			</li>
			<li class="active">Data</li>
		</ul>		
	</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span6">
						<legend><strong>Lihat Data Kontak Kami</strong></legend>
				</div>
					<div class="span6 listing-buttons">
						<a href="?modul=kontak" class="btn btn-primary">Kembali</a>
					</div>
	<div class="span12">
	<?php 
	$query=mysql_query("SELECT * FROM kontak WHERE id_kontak='".$_GET['id']."'")or die(mysql_error());
		while($data=mysql_fetch_array($query))
		{
		echo"<div class=span8 tengah>";
		$id_kontak		=$data['id_kontak'];
		$nama			=$data['nama'];
		$email			=$data['email'];
		$subjek			=$data['subjek'];
		$isi_pesan		=$data['isi_pesan'];
		$tgl		=$data['tgl'];
		echo"<table>
			<tr>
			<td>Id Member</td><td> :</td><td> $id_kontak </td>
			</tr>
			<tr>
			<td>Nama</td><td> 		:</td><td> $nama</td>
			</tr>
			<td>Email</td><td> :</td><td>  $email</td>
			</tr>
			<tr>
			<td>Subjek </td><td> :</td><td>$subjek</td>
			</tr> 
			<tr>
			<td>Isi Pesan </td><td> :</td><td>$isi_pesan </td>
			</tr> 
			<tr>
			<td>tanggal</td><td> :</td><td>$tgl </td>
			</tr> 
			</table>";
		
		echo"<a class='btn btn-primary' href='mailto:$email?subject=$subjek'>Balas</a>"; 
}
?>
	</div>
	</div>
