<?php 
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
?>
	
		<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi">welcome</div>
			<div class="well row-fluid isi"> <legend> Pilihan Menu Spesial Kami </legend>
			<?php 
					$sql = "SELECT * FROM menu ORDER BY rand() LIMIT 3";
					$query = mysql_query($sql);
					while ($data = mysql_fetch_array($query))
					{
						$desc = htmlentities(strip_tags($data['keterangan_menu']));
						$deskripsi = substr($desc,0,70); // ambil 70 karakter
						$deskripsi = substr($desc,0,strrpos($deskripsi," ")); // break per spasi
						echo "<div class=\"span4\">
							<div class=\"judul\"><h5>{$data['nama_menu']}</h5></div>
							<a href=\"#\" class=\"thumbnail thumbnail-index\">
								<img src=\"assets/menu/{$data['gambar_menu']}\" alt=\"{$data['nama_menu']}\">
							</a>
							{$deskripsi} ..<a href=\"produk_detail.php?id={$data['id_menu']}&p={$data['nama_menu']}\">Selengkapnya</a>
							<p><span class=\"label\">Rp ".number_format($data['harga_menu'], 2, ',', '.')."</span></p><a class=\"btn btn-small btn-info\" href=\"aksi.php?module=keranjang&act=tambah&id={$data['id_menu']}\">Beli</a>
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
	
	