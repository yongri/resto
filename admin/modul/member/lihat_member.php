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
						<legend><strong>Lihat Data Member</strong></legend>
				</div>
					<div class="span6 listing-buttons">
						<a href="?modul=member" class="btn btn-primary">Kembali</a>
					</div>
	<div class="span12">
	<?php 
	$query=mysql_query("SELECT * FROM member a,kota b WHERE a.id_kota=b.id_kota AND id_member='".$_GET['id']."'")or die(mysql_error());
		while($data=mysql_fetch_array($query))
		{
		echo"<div class=span8 tengah>";
		$id_member		=$data['id_member'];
		$nama_lengkap	=$data['nama_lengkap'];
		$username		=$data['username'];
		$email			=$data['email'];
		$password		=$data['password'];
		$alamat			=$data['alamat'];
		$nama_kota		=$data['nama_kota'];
		$kode_pos		=$data['kode_pos'];
		$telpon			=$data['telpon'];
		$aktif			=$data['aktif'];
		echo"<table>
			<tr>
			<td>Id Member</td><td> :</td><td> $id_member </td>
			</tr>
			<tr>
			<td>nama_lengkap</td><td> 		:</td><td> $nama_lengkap</td>
			</tr>
			<tr>
			<td>Username</td><td> :</td><td>   $username</td>
			</tr>
			<tr>
			<td>Email</td><td> :</td><td>  $email</td>
			</tr>
			<tr>
			<td>Alamat </td><td> :</td><td>$alamat</td>
			</tr> 
			<tr>
			<td>Kota</td><td> :</td><td>$nama_kota </td>
			</tr>  
			<tr>
			<td>Kode pos</td><td> :</td><td>$kode_pos</td>
			</tr> 
			<tr>
			<td>Telpon</td><td> :</td><td>$telpon </td>
			</tr>
			</table>
		</div>";
}
?>
	</div>
