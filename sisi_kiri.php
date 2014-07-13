
<div class="span4 left"> 
<div class="row-fluid kosong"></div>
		
			<?php
			
		if(isset($_SESSION['id_member'])) //sudh login
		{
			echo "
				<div class='well row-fluid kiri'>
				<ul class='nav nav-list'>
				<li class='nav-header'>
				Selamat Datang, <b> ".$_SESSION['nama_lengkap']." </b>
				</li>
				<li class='active'>";
				//$id_session = session_id();
				//$sql = "SELECT * FROM transaksi_temp a, member b WHERE a.id_member=b.id_member AND id_session='".$_SESSION['username']."'";
				//$query = mysql_query($sql);
			//while($data=mysql_fetch_array($tampil)) {
				echo"<a href='edit_profil.php?id=".$_SESSION['id_member']."'>Edit Profil</a>
				</li>
				<li>
				<a href='pesanan.php'>Cek Pesanan</a>
				</li>
				<li>
				<a href='logout.php'>Keluar</a>
				</li>
				</ul> </div>";
		}
		else
		{
			echo'
				<div class="well row-fluid kiri">
				<span class="nav-header"><b><a href="login.php">Login</a> | Belum Punya Akun? Klik <a href="signup.php">Disini</a></b></span></div>';
		}
		?>
			<div class="well row-fluid kiri">
				<?php 
			if( ! isset($_SESSION['id_member']))
		{
			
			echo "Keranjang Belanja Anda masih kosong<br/>";
		} 
		else 
			{ $sid = session_id();
				  $sql="SELECT COUNT(jumlah_beli) FROM transaksi_temp WHERE id_session='$sid'";
			      $query=mysql_query($sql); //echo $sql;
				  while($data=mysql_fetch_array($query)) {
				  if($data['COUNT(jumlah_beli)']>0) 
				  {
					echo 'Quantity: '.$data['COUNT(jumlah_beli)'].' | <a href="keranjang_belanja.php">Lihat Keranjang</a>';
				  } 
				  else 
				  {
					echo "Keranjang Belanja Anda masih kosong<br>";
					
				  } 
				  }
			}
			?>
			</div>
			<div class="well row-fluid kiri">Kategori Menu
				<ul><li><a href="masakan_indo.php">Masakan Indonesia</a></li>
				<li><a href="masakan_china.php">Masakan Chinese</a></li>
				</ul>
			</div>
			<div class="well row-fluid kiri">
			<span class="nav-header">Kontak Kami :</span>
			<p>Restaurant Matahari Jaya Blok. Af1 No.03<br/>
				Kota Tangerang Indonesia<br/>
				Telp : 021-5566745
			</p>
			</div>
			<div class="well row-fluid kiri">
			<span class="nav-header"><a class="btn" href="testimoni.php" rel="tooltip" title="Tambah Komentar"> Komentar </a></span>
		<marquee align="center" direction="up" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()" height="100" width="95%"> <span style="color:red; font-weight: bold;"></span>
		<?php		
		$sql="SELECT * FROM testimoni ORDER BY id_testimoni DESC";
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{
			echo"<br><br>
		<b>$data[nama]</b><br>
			$data[isi_pesan]";
		}
		?>
		</marquee>
			
			</div>
			<div class="well row-fluid kiri"><span class="nav-header">Rekening</span>
			<img src="assets/img/mandiri.jpg" height="100px" width="100px">
			
			</div>
			<div class="well row-fluid kiri"><span class="nav-header">Sosial Media</span>
			<img src="assets/img/facebook.jpg" height="100px" width="100px">
			<img src="assets/img/twitter.jpg" height="100px" width="100px">
			<img src="assets/img/yahoo.jpg" height="100px" width="100px">
			
			</div>
		</div>