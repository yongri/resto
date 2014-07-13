<div class="secondary-masthead">
	<div class="container">
		<ul class="breadcrumb">
			<li>
			<a href="#">Dashboard</a> <span class="divider">/</span>
			</li>
			<li class="active">Konfirmasi Pembayaran</li> <span class="divider">/</span>
			</li>
			<li class="active">Data</li>
		</ul>		
	</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span6">
						<legend><strong>Lihat Data Konfirmasi Pembayaran</strong></legend>
				</div>
					<div class="span6 listing-buttons">
						<a href="?modul=konfirmasi" class="btn btn-primary">Kembali</a>
					</div>
	<div class="span12">
	<?php
	if($_POST)
	{
		$id_transaksi =$_POST['id_transaksi'];
		$status   =$_POST['status'];
		//echo $id_transaksi." ".$status;
		$sql="UPDATE konfirmasi SET status='$status' WHERE id_transaksi='$id_transaksi'";
		$query=mysql_query($sql);
		//echo $sql;
		if($query)
		{ 
			echo'<div class="alert alert-success">
			<a class="close" data-dismiss="alert">x</a>
			Update Status sukses
			</div>';
		}
	}
	
	
	
	
	$query="SELECT * FROM konfirmasi WHERE id_transaksi='".$_GET['id']."'";
		$sql=mysql_query($query);
		while($data=mysql_fetch_array($sql))
		{
		echo"<div class=span8 tengah>";
		$id_transaksi	=$data['id_transaksi'];
		$bank_bayar		=$data['bank_bayar'];
		$no_rek			=$data['no_rek'];
		$pemilik_rek	=$data['pemilik_rek'];
		$tgl_transfer	=$data['tgl_transfer'];
		$waktu_transfer	=$data['waktu_transfer'];
		$nominal_bayar	=$data['nominal_bayar'];
		$status			=$data['status'];
		echo"<form action='dashboard.php?modul=konfirmasi&action=lihat' method=post><table>
			<tr>
			<td>Id transaksi</td><td> :</td><td><input type='hidden' value='$id_transaksi' name='id_transaksi'>$id_transaksi</td>
			</tr>
			<tr>
			<td>Metode Bayar </td><td> :</td><td>   $bank_bayar</td>
			</tr>
			<tr>
			<td>No.Rekening </td><td> :</td><td>  $no_rek</td>
			</tr>
			<tr>
			<td>Pemilik Rekening </td><td> :</td><td>$pemilik_rek</td>
			</tr> 
			<tr>
			<td>Tanggal Transfer </td><td> :</td><td>$tgl_transfer </td>
			</tr> 
			<tr>
			<td>Waktu Transfer </td><td> :</td><td>$waktu_transfer</td>
			</tr>
			<tr>
			<td>Nominal </td><td> :</td><td>$nominal_bayar</td>
			</tr>
			<tr>
			<td>Status </td><td>:</td>
			<td>
			<select name='status'>
			<option value='Belum Di Check' ";
		echo ($status=='Belum Di Check') ? 'selected' : '' ; 
		echo ">Belum Di Check </option>
			<option value='Sudah Di Check' ";
		echo ($status=='Sudah Di Check') ? 'selected' : '' ;
		echo ">Sudah Di Check </option>
			</select>
			</td>
			</tr>
			<tr>
			<td>
			<input type=submit value='Simpan' name='simpan' class='btn btn-primary'>
			</td>
			</tr>
			</table>
			</form>
		</div>";
		}
?>
	</div>
