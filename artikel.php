<?php 
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
include "picture_box.php";
?>
	
		<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi"> <legend> Artikel</legend>
			<?php  //$sql = "SELECT * FROM menu WHERE kategori='indonesia' ORDER BY id_menu DESC";
					$sql = "SELECT * FROM artikel ORDER BY rand() LIMIT 3";
					$query = mysql_query($sql);
					while ($data = mysql_fetch_array($query))
					{
						$desc = htmlentities(strip_tags($data['judul_artikel']));
						$deskripsi = substr($desc,0,70); // ambil 70 karakter
						$deskripsi = substr($desc,0,strrpos($deskripsi," ")); // break per spasi
						echo "<div class=\"span4\">
							<div class=\"judul\"><h5>{$data['judul_artikel']}</h5></div>
							<a href=\"#\" class=\"thumbnail thumbnail-index\">
								<img src=\"assets/img/{$data['gambar_artikel']}\" alt=\"{$data['judul_artikel']}\">
							</a>
							{$deskripsi} ..<a href=\"artikel_detail.php?id={$data['id_artikel']}&p={$data['judul_artikel']}\">Selengkapnya</a>
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
	
	