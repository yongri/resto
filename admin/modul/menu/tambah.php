<div class="secondary-masthead">
				<div class="container">
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a> <span class="divider">/</span>
						</li>
						<li class="active">Menu</li> <span class="divider">/</span>
						</li>
						<li class="active">Tambah</li>
					</ul>
				
				</div>
		</div>
		<div class="main-area dashboard">
			<div class="container">
				<div class="row">
					<div class="span6">
						<h3>Tambah Data Menu</h3>
					</div>
					<div class="span6 listing-buttons">
						<a href="?modul=menu" class="btn btn-primary">Kembali</a>
					</div>
		<div class="span12">
				<?php if ($_POST)
				{
					$id_menu=$_POST['id_menu'];
				
					if(empty($_POST['kategori']))
					{
						$error['err_Kategori']='Kategori harus dipilih';
					}
					else
					{
						$kategori=$_POST['kategori'];
					}
					if(empty($_POST['nama_menu']))
					{
						$error['err_NamaMenu']='Nama Menu harus diisi';
					}
					else
					{
						$nama_menu=$_POST['nama_menu'];
					}
					if(empty($_POST['keterangan_menu']))
					{
						$error['err_DetailMenu']='Detail Menu harus diisi';
					}
					else
					{
						$keterangan_menu=$_POST['keterangan_menu'];
					}
					if(empty($_POST['harga_menu']))
					{
						$error['err_harga']='Harga harus diisi';
					}
					else
					{
						$harga=$_POST['harga_menu'];
					}
					if(empty($_POST['stok']))
					{
						$error['err_stok']='Stok harus diisi';
					}
					else
					{
						$stok=$_POST['stok'];
					}
					 /* if(empty($_POST['Menu']))
					{
						$error['err_Menu']='Pilih Gambar Menu!';
					}
					else
					{
						$Menu=move_uploaded_file($_FILES['Menu'][0]['tmp_name'],"Menu/".$_FILES['Menu'][0]['name']);
					} */
					if ( empty($error))
					{
						$menu=$_FILES['menu']['name'];
						$fisik_menu=$_FILES['menu']['tmp_name'];
						//$status=$_POST['status'];
						$tanggal=date('Y').'-'.date('m').'-'.date('d');
						
						$input="INSERT INTO menu VALUES ('$id_menu','$kategori','$nama_menu','$keterangan_menu','$harga','$stok','$menu')";
						$perintah=mysql_query($input);
						//echo $input;
						if (move_uploaded_file($fisik_menu,"../assets/menu/".$menu))
						{
						echo' berhasil!';
						}
						else
						{
						echo'gagal';
						}
						if ($perintah) {
								echo '<div class="alert">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Data Produk Tersimpan!</strong>
									</div>';
										}
							else {
								echo '<div class="alert">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Data Produk Tidak Tersimpan!</strong>
									</div>';
							}
					}
				/*	else
					{
						var_dump($error);
					} */
				}
				

				?>
<!-- <div class="span12 tengah"> -->
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="form1" onsubmit="return cekNumerik()">
			<div class="control-group <?php echo (isset($error['err_IdMenu'])) ? 'warning' : ''; ?>" id="Id_menu">
				<label class="control-label" for="id_menu"></label>
					<div class="controls">
					<input type="hidden" value="<?php echo (isset($id_menu)) ? $id_menu : ''; ?>" id="id_menu" name="id_menu">
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['err_Kategori'])) ? 'warning' : ''; ?>" id="kategori">
				<label class="control-label" for="kategori">Kategori</label>
					<div class="controls">
					<select name=kategori id="kategori">
					<option value="indonesia">indonesia</option>
					<option value="chinese">chinese</option>
					</select>
					<span class="help-inline"><?php echo (isset($error['err_Kategori'])) ? $error['err_Kategori'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['err_NamaMenu'])) ? 'warning' : ''; ?>" id="nama_menu">
				<label class="control-label" for="nama_menu">Nama Menu</label>
					<div class="controls">
					<input type="text" class="span5" value="<?php echo (isset($nama_menu)) ? $nama_menu : ''; ?>" id="nama_menu" name="nama_menu">
					<span class="help-inline"><?php echo (isset($error['err_NamaMenu'])) ? $error['err_NamaMenu'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['err_DetailMenu'])) ? 'warning' : ''; ?>" id="keterangan_menu">
				<label class="control-label" for="keterangan_menu">Keterangan Menu</label>
					<div class="controls">
					<textarea name="keterangan_menu"  cols="45" rows="5"><?php echo (isset($keterangan_menu)) ? $keterangan_menu : ''; ?></textarea>
					<span class="help-inline"><?php echo (isset($error['err_DetailMenu'])) ? $error['err_DetailMenu'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['err_harga'])) ? 'warning' : ''; ?>" id="harga">
				<label class="control-label" for="harga">Harga</label>
					<div class="controls">
					<input type="text" value="<?php echo (isset($harga)) ? $harga : ''; ?>" id="harga" name="harga_menu">
					<span class="help-inline"><?php echo (isset($error['err_harga'])) ? $error['err_harga'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['err_stok'])) ? 'warning' : ''; ?>" id="stok">
				<label class="control-label" for="stok">Stok</label>
					<div class="controls">
					<input type="text" class="input-mini" value="<?php echo (isset($stok)) ? $stok : ''; ?>" id="stok" name="stok">
					<span class="help-inline"><?php echo (isset($error['err_stok'])) ? $error['err_stok'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group" id="menu">
				<label class="control-label" for="menu">Gambar</label>
					<div class="controls">
					<input type="file" id="menu" name="menu">
					</div>
			</div>
			<div class="control-action">
				<div class="controls">
					<input name="bkirim" type="submit" id="bkirim" class="btn btn-success" value="Simpan" />
					<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
				</div>
			</div>
</form>
			</div>
			