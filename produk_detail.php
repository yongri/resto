<?php 
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
include "picture_box.php";
$id_menu = $_GET['id'];
$sql = "SELECT * FROM menu WHERE id_menu = '{$id_menu}'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$gambar=$data['gambar_menu'];
$nm_menu=$data['nama_menu'];
?>
<div class="span6 tengah">
<div class="row-fluid kosong"></div>
	<div class="well row-fluid isi"> <legend>Detail Menu</legend>
		<span class="nav-header"><h4><?php echo $nm_menu; ?></h4></span><br/>
				<div class="span6">
					<div id="gambar">
						<a href="assets/menu/<?php echo $gambar; ?>"
					class="pirobox" title="<?php echo $nm_menu; ?>"></a>
					<a href="assets/menu/<?php echo $gambar; ?>"
					class="pirobox" title="<?php echo $nm_menu; ?>">
					<img src="assets/menu/<?php echo $gambar; ?>" alt="" width="50%" height="50%"/></a>
					</div><br/>
					<span class="nav-header">
					<b>Keterangan Menu</b>
					</span>
					<p><?php echo $data['keterangan_menu']; ?></p>
						<span class="label label-info"><?php echo "Rp ".number_format($data['harga_menu'], 2, ',', '.')." </span>"; ?>
						<a class="btn btn-small btn-info" href="aksi.php?module=keranjang&act=tambah&id=<?php echo $data['id_menu']; ?>">Beli</a>
				</div>
	</div>
</div>
<?php 
include "footer.php";
?>	
	
	