<div class="secondary-masthead">
				<div class="container">
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a> <span class="divider">/</span>
						</li>
						<li class="active">Ongkos Kirim</li> <span class="divider">/</span>
						</li>
						<li class="active">Tambah</li>
					</ul>
				
				</div>
		</div>
		<div class="main-area dashboard">
			<div class="container">
				<div class="row">
					<div class="span6">
							<h3>Tambah Ongkos Kirim</h3>
					</div>
					<div class="span6 listing-buttons">
						<a href="?modul=ongkos_kirim" class="btn btn-primary">Kembali</a>
					</div>
		<div class="span12">
		<?php
if ($_POST)
{		// validasi input
	$id_kota=$_POST['id_kota'];
	
	if (empty($_POST['nama_kota']))
	{
		$error['errNamaKota']="Nama Kota harus diisi";	
	}
	else
	{
		$nama_kota=$_POST['nama_kota'];
	}
	if (empty($_POST['ongkos_kirim']))
	{
		$error['errOngkosKirim']="Ongkos Kirim harus diisi";	
	}
	else
	{
		$ongkos_kirim=$_POST['ongkos_kirim'];
	}
if ( empty($error))
		{
		$input="INSERT INTO kota VALUES('$id_kota','$nama_kota','$ongkos_kirim')";
		$perintah=mysql_query($input) or die(mysql_error());
		if ($perintah) {
				echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Data Ongkos Kirim telah tersimpan!</strong>
					</div>';
				}
			else {
				echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Data Ongkos Kirim Tidak Tersimpan!</strong>
					</div>';
				}
		}
}		

?>
<div class="span8 tengah">
	<form action="" method="post" name="form1" class="form-horizontal">
		<fieldset>
		<div class="control-group">
					<label class="control-label" for="kota"></label>
						<div class="controls">
						<input type="hidden" value="<?php echo (isset($id_kota)) ? $id_kota : ''; ?>" id="id_kota" name="id_kota">
						</div>
		</div>	
		<div class="control-group <?php echo (isset($error['errNamaKota'])) ? 'warning' : ''; ?>" id="nama-kota">
					<label class="control-label" for="nama-kota">Nama Kota</label>
						<div class="controls">
						<input type="text" value="" id="nama_kota" name="nama_kota">
						<span class="help-inline"><?php echo (isset($error['errNamaKota'])) ? $error['errNamaKota'] : ''; ?></span>
						</div>
		</div>	
		<div class="control-group <?php echo (isset($error['errOngkosKirim'])) ? 'warning' : ''; ?>" id="ongkos-kirim">
					<label class="control-label" for="ongkos-kirim">Ongkos Kirim</label>
						<div class="controls">
						<input type="text" value="" id="ongkos_kirim" name="ongkos_kirim">
						<span class="help-inline"><?php echo (isset($error['errOngkosKirim'])) ? $error['errOngkosKirim'] : ''; ?></span>
						</div>
		</div>
		<div class="control-action <?php echo (isset($error['login'])) ? 'warning' : ''; ?>" id="c-kirim">
					<div class="controls">
						<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Simpan" />
						<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
						<span class="help-inline"><?php echo (isset($error['login'])) ? $error['login'] : ''; ?></span> 
					</div>
		</div>
		</fieldset>
	</form>
</div>