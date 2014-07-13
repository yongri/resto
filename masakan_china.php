<?php 
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
include "picture_box.php";
?>
	
		<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi"> <legend> Chinese Food</legend>
			<?php  //$sql = "SELECT * FROM menu WHERE kategori='indonesia' ORDER BY id_menu DESC";
					$sql = "SELECT * FROM menu WHERE kategori='chinese' ORDER BY id_menu";
					$query = mysql_query($sql); 
					while ($data = mysql_fetch_array($query))
					{
						$gambar_menu=$data['gambar_menu']; 
						$nama_menu=$data['nama_menu']; 
						echo "<div class=\"span4 menu\">
							<div class=\"judul\"><h5>{$data['nama_menu']}</h5></div>
					<div id=\"gambar_menu\">  
					
					<a href=\"assets/menu/".$gambar_menu."\"
					class=\"pirobox\" title=\"{$nama_menu}\">
					
					<img src=\"assets/menu/".$gambar_menu."\" alt=\"\" width=\"50%\" height=\"50%\"/></a>
					</div><br/>
								
							<p><span class=\"label label-info\">Rp ".number_format($data['harga_menu'], 2, ',', '.')."</span></p>
							<a class=\"btn btn-small btn-info\" href=\"aksi.php?module=keranjang&act=tambah&id={$data['id_menu']}\">Beli</a>
							<a class=\"btn btn-small btn-info\" href=\"produk_detail.php?id=".$data['id_menu']."\">Lihat detail</a>
							</div>";
					}
					?>
			</div>
		</div>
	</div>
</div><!-- Penutup Container -->
<?php 
include "footer.php";
?>	
	
	s