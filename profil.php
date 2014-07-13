<?php 
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
include "picture_box.php";
$sql = "SELECT * FROM profil WHERE id_profil = '1'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$visi=$data['visi'];
$misi=$data['misi'];
$sejarah=$data['sejarah'];
?>
<div class="span6 tengah">
<div class="row-fluid kosong"></div>
	<div class="well row-fluid isi"> <legend>Profil Restaurant Kami</legend>
					<div class="row-fluid isi">
					<img src="assets/img/galery_toko.jpg" width="500px" height="500px"><br><br>
					<?php echo $visi; ?><br><br>
					<?php echo $misi; ?><br><br>
					<?php echo $sejarah; ?><br><br>
					</div>
	</div></div>
</div><!-- Penutup Container -->
<?php 
include "footer.php";
?>	
	
	