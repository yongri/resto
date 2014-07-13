<?php 
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
include "picture_box.php";
$id_artikel = $_GET['id'];
$sql = "SELECT * FROM artikel WHERE id_artikel = '{$id_artikel}'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$gambar_artikel=$data['gambar_artikel'];
$judul_artikel=$data['judul_artikel'];
?>
<div class="span6 tengah">
<div class="row-fluid kosong"></div>
	<div class="well row-fluid isi"> <legend>Detail artikel</legend>
		<p><h4><?php echo $judul_artikel; ?></h4></p>
			<div class="row-fluid">
				<div class="span6">
					<div id="gambar_artikel">
						<a href="assets/img/<?php echo $gambar_artikel; ?>"
					class="pirobox" title="<?php echo $judul_artikel; ?>"></a>
					<a href="assets/img/<?php echo $gambar_artikel; ?>"
					class="pirobox" title="<?php echo $judul_artikel; ?>">
					<img src="assets/img/<?php echo $gambar_artikel; ?>" alt="" width="50%" height="50%"/></a>
					</div><br/>
					<p><?php echo $data['deskripsi_artikel']; ?></p>
			</div></div>
	</div></div>
</div><!-- Penutup Container -->
<?php 
include "footer.php";
?>	
	
	