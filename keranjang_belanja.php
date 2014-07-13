<?php 
session_start();
	  if(!isset($_SESSION['username']))
	  {
			header('location:login.php?redirect=keranjang_belanja');
	  } 
include "konek.php";
include "header.php";
include "sisi_kiri.php";
$id_session = session_id();
?>
	
		<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi"> <legend> Keranjang Belanja </legend>
			<?php
	$sql = "SELECT * FROM transaksi_temp a, menu b WHERE a.id_menu = b.id_menu AND id_session = '" . $id_session . "' GROUP BY a.id_menu ORDER By a.id_session DESC";
	$query=mysql_query($sql);	
	  $jml = mysql_num_rows($query);
	  if($jml)
	{
		echo'<form method="post" action="aksi.php?module=keranjang&act=update">
		<table class="table table-striped">
			 <thead>
				<tr> 
					<th width="40px"> No </th>
					<th width="60px"> ID Menu </th>
					<th width="90px">Menu</th>
					<th width="100px">Nama Menu</th>
					<th width="40px">Qty</th>
					<th width="70px">Harga</th>
					<th width="70px">Subtotal</th>
					<th width="50px">Aksi</th>
				</tr>
			</thead>';
			$no=1;
			while($data=mysql_fetch_array($query)) 
			{
				$subtotal=$data['jumlah_beli'] * $data['harga_menu'];
						$total = $total + $subtotal;
				echo'<tbody>';
				echo '<tr>';
				echo'<td width="40px">'.$no.'</td><input type="hidden" name="id[$no]" value="'.$data['id_session'].'">';
				echo'<td width="60px">'.$data['id_menu'].'</td>';
				echo'<td width="90px"><img src="assets/menu/'.$data['gambar_menu'].'" width="50%" height="50%"></td>';
				echo'<td width="100px">'.$data['nama_menu'].'</td>';
				echo'<td width="40px"><input type=\"text\" name="jml[$no]" value="'.$data['jumlah_beli'].'" size=\"1\" onkeypress=\"return harusangka(event)\"></td>';
				echo'<td width="70px">'.number_format($data['harga_menu'], 0, ',', '.').'</td>';
				echo'<td width="70px">'.number_format($subtotal, 0, ',', '.').'</td>';
				//echo'<td><a href="javascript:void(0);"><a href="aksi.php?module=keranjang&act=update&id='.$data['id_menu'].'" class="btn btn-mini btn-info">Update</a></td>';
				echo "<td><input type=image src='assets/img/update.jpg' border=0></td>";
				//echo'<td><input class="btn btn-mini btn-info" type="button" value="Update"></td>';
				echo'<td><a class="btn btn-mini btn-info" href="aksi.php?module=keranjang&act=hapus&id='.$data['id_menu'].'">Hapus</a></td>';
				echo'</tr>';
				$no++; 
			}
	
			$sql2 = "SELECT * FROM member a, kota b WHERE a.id_kota = b.id_kota AND id_member = '" .$_SESSION['id_member']. "'";
			$query2=mysql_query($sql2);	
			$data2=mysql_fetch_array($query2);
			$ongkos_kirim=$data2['ongkos_kirim'];
			$grand_total=$total + $ongkos_kirim;
			echo'<tr><td></td><td></td><td></td><td></td><td width="70px"><b>Total</b></td><td width="70px"><b>Rp '.number_format($total, 0, ',', '.').'</b></td><td></td><td></td></tr>';
			echo'<tr><td></td><td></td><td></td><td></td><td width="70px"><b>Ongkos Kirim</b></td><td width="70px"><b>Rp '.number_format($ongkos_kirim, 0, ',', '.').'</b><td></td><td></td></td></tr>';
			echo'<tr><td></td><td></td><td></td><td></td><td width="70px"><b>Grand Total</b></td><td width="70px"><b>Rp '.number_format($grand_total, 0, ',', '.').'</b><td></td><td></td></td></tr>';
			echo'</tbody>';
			echo'</table>';
			echo'</form>';
			echo'	<div class="span4" align="left">
						<a class="btn btn-info" href="index.php">Lanjut Belanja</a>
					</div>';
			echo'<div class="span4" align="left">
					<a class="btn btn-info" href="selesai_belanja.php">Selesai Belanja</a>
					</div><br/><br/><br/>';
			echo'<div class="span12"><p> *) Apabila Anda mengubah jumlah (Qty), jangan lupa tekan tombol Update.</p></div><br/><br/><br/>';
	echo'<legend>Data Pemesan : </legend>
	<p>Jika Anda ingin mengubah data-data pengiriman Anda, silahkan klik <a href="edit_profil.php?id='.$data2['id_member'].'">disini</a></p>';
		echo'<table border=0>
		<tr>
			<td> Nama 	</td>	
			<td> : </td>
			<td>'.$data2['nama_lengkap'].'</td>
		</tr>
		<tr>
			<td> Alamat </td>
			<td> : </td>
			<td>'.$data2['alamat'].'</td>
		</tr>
		<tr>
			<td> Kota  </td>
			<td> : </td> 
			<td>'.$data2['nama_kota'].'</td>
		</tr>
		<tr>
			<td> Kode Pos </td>
			<td> : </td>
			<td>'.$data2['kode_pos'].'</td>
		</tr>
		<tr>
			<td> Telepon </td>	
			<td> : </td>
			<td>'.$data2['telpon'].'</td>
		</tr>
			</table>';
	}
	else
	{
		echo'<p>Keranjang Belanja Anda kosong!</p>';
	}
	  ?>
			</div>
		
</div><!-- Penutup Container -->
<?php 
include "footer.php";
?>	
	
	