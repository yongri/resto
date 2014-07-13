<?php error_reporting(0);
      session_start();
	  if(!isset($_SESSION['id_member']))
	  {
			header('location:login.php?redirect=keranjang_belanja');
	  }
	  include "konek.php"; 
      include "header.php";
	  include "library/class.phpmailer.php";
	  $id_session = session_id();
?>
<div class="span6 tengah">
<div class="row-fluid kosong"></div>
	<div class="well row-fluid isi">
	<?php 
	$sql1="SELECT * FROM transaksi_temp WHERE id_session='".$id_session."'";
	$query1=mysql_query($sql1);
	//$data1=mysql_fetch_array($query1);
	$id_transaksi	=mysql_insert_id();
	$tgl_transaksi	=date('Y-m-d');
	$jam			=date('H:i:s');
	$alamat_kirim	=$_SESSION['alamat_kirim'];
	//$kode_pos		=$_POST['kode_pos'];
	$id_kota		=$_SESSION['id_kota'];
	$id_member		=$_SESSION['id_member'];
	
		//simpan ke tabel pesan
		$sql2="INSERT INTO transaksi(id_transaksi ,status_transaksi, tgl_transaksi , jam_transaksi , alamat_kirim , id_member,id_kota, id_session) VALUES('$id_transaksi','Belum Lunas','$tgl_transaksi','$jam','$alamat_kirim','$id_member','$id_kota','$id_session')";
		if(mysql_query($sql2))
		{
			echo'Transaksi Anda Sudah Kami Terima.';
		}
		else
		{
			echo'failed!';
		}
		$sql3  = "SELECT * FROM transaksi_temp a, menu b WHERE a.id_menu = b.id_menu AND id_session = '" . $id_session . "' ORDER By a.id_session DESC";
		//echo $query;
		$query3 = mysql_query($sql3) or die(mysql_error());
		if (mysql_num_rows($query3) > 0)
		{
			$id_now = '';
			$jumlah_beli = 0;
			$data = array();
			while($row = mysql_fetch_array($query3, MYSQL_ASSOC))
			{
				if ($id_now == $row['id_menu'])
				{
					$jumlah_beli++;
				}
				else
				{
					$jumlah_beli = 1;
				}
				$data[$row['id_menu']] = $jumlah_beli;
				$id_now = $row['id_menu'];		
			}
		}
		//var_dump($data);
		$error = false;
		foreach ($data as $key=>$value)
		{
			$sql = "INSERT INTO transaksi_detail VALUES('$id_transaksi','$key','$value')";
			//echo $sql;
			if (mysql_query($sql))
			{
				echo "Terima Kasih.";
			}
			else
			{
				$error = true;
			}
		}
				
				if (! $error)
				{
					$pesan.='Terima Kasih   '. $_SESSION['nama_lengkap'] .'  Anda Telah memesan menu pilihan kami di Resto Online Matahari Jaya <br><br>';
					$pesan.='---------------------------------------------------------------------------------------------------------<br>';
					$pesan.='ORDER NO : '.$id_transaksi.' <br><br>';
					$pesan.='WAKTU PEMESANAN  '.$tgl_transaksi.'  Pada Pukul  '.$jam.' <br><br>';
					$pesan.='---------------------------------------------------------------------------------------------------------<br>';
					$query  = "SELECT * FROM transaksi_temp a, menu b, transaksi c, kota d WHERE a.id_menu = b.id_menu AND c.id_kota = d.id_kota";
					$result = mysql_query($query) or die(mysql_error());
					if (mysql_num_rows($result))
					{
						$pesan .= '<table class="table table-strip">
							<tr>
								<th>
									menu
								</th>
								<th>
									Jumlah
								</th>
								<th>
									Harga
								</th>
								<th>
									Subtotal
								</th>
							</tr>';
						while($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
							$sql2  			= "SELECT jumlah_beli FROM transaksi_temp WHERE id_menu='".$_GET['id_menu']."' AND id_session ='".$id_session."'";
							$result2 		= mysql_query($sql2);
							$row3 			= mysql_fetch_array( $result2 );
							$jumlah 		= $row3['jumlah_beli'];
							$subtotal 		= $jumlah * $row['harga_menu'];
							$ongkos_kirim	=$row['ongkos_kirim'];
							$total 			= $total + $subtotal;
							$pesan 			.= '<tr id="nm_menu_'. $row['nama_menu'] .'">
									<td>
										'.$row['nama_menu'].'
									</td>
									<td>
									'.$jumlah.' 
									</td>
									<td>
									'.number_format($row['harga_menu'], 2, ',', '.').'
									</td>
									<td>
									'.number_format($subtotal, 2, ',', '.').'
									</td>
								</tr>';
						}
						$pesan.= '<tr>
									<th colspan="3">
										Harga Total
									</th>
									<th class="total-harga">
									'.number_format($total, 2, ',', '.').'
									</th>
									<td>
									</td>
								</tr>
								<tr>
									<th colspan="3">
										Ongkos Kirim
									</th>
									<th class="ongkos-kirim" align="right">
				 '.number_format($ongkos_kirim, 2, ',', '.').'
				</th>
									<td>
									</td>
								</tr>';
					$total_semua = $total+$row['ongkos_kirim'];
					$pesan.= '
								<tr>
									<th colspan="3">
										Total Bayar
									</th>
									<th class="total-bayar">
									Rp'.number_format($total_semua, 2, ',', '.').'
									</th>
									<td>
									</td>
								</tr>
							</table><br>';
					}
					
					
					$pesan.='<p> Untuk Pembayaran dengan rekening BCA, silahkan transfer ke rekening berikut : 
							 BCA Cabang Plaza Merdeka Mas, Tangerang
							 No.Rek 8820424261 
							 a/n Muhammad Reyan</p><br>';
					$pesan.='Jika telah melakukan transfer, silahkan Konfirmasi Pembayaran Pesanan Anda Melalui <a href="localhost/konfirmasi_pembayaran.php?id_transaksi='.$id_transaksi.'">Link Ini</a><br>';
				
					$mail = new PHPMailer();
					$mail->IsHTML(true);
					$mail->Body = $pesan;
					$mail->IsSMTP(); // telling the class to use SMTP
					$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
																	   // 1 = errors and messages
																	   // 2 = messages only
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
					$mail->Host       = "smtp.gmail.com";      // we use GMAIL as the SMTP server
					$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
					$mail->Username   = "resto.mataharijaya@gmail.com";  // GMAIL username
					$mail->Password   = "restomataharijaya2014";            // GMAIL password
					$mail->SetFrom('admin@mataharijaya.co.id', 'Resto Matahari Jaya');
					$mail->Subject    = "Pemesanan menu Anda - Order No ".$id_transaksi;
					$mail->AltBody    = "To view the message, please use an HTML compatible mail viewer!"; // optional, comment out and test
					$mail->AddAddress($_SESSION['email'], $_SESSION['nama_lengkap']);
					if( ! $mail->Send()) 
					{
						echo "Mailer Error: " . $mail->ErrorInfo;
					} 
					else 
					{ 
						echo"Silahkan Cek Total Pesanan Anda di Menu Cek Pesanan!";
						//setelah data pemesanan terkirim, hapus data pemesanan di tabel pemesanan sementara(transaksi_temp)
						$sql="DELETE FROM transaksi_temp WHERE id_session='$id_session'";
						mysql_query($sql);
					}
				}
?>				
	</div>
</div>
<?php
include "sisi_kanan.php";
include "footer.php";

?>
	    