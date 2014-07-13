<?php
if (isset($_POST['bkirim']))
{
	$id_kota=$_POST['id_kota'];
	if(empty($_POST['nama_kota']))
	{
		$error['errnama_kota']='Nama Kota harus diisi';
	}
	else
	{
		$nama_kota=$_POST['nama_kota'];
	}
	if(empty($_POST['ongkos_kirim']))
	{
		$error['errongkos_kirim']='Ongkos Kirim harus diisi';
	}
	else
	{
		$ongkos_kirim=$_POST['ongkos_kirim'];
	}
	if(empty($error))
	{	
	$query="UPDATE kota SET nama_kota='$nama_kota' , ongkos_kirim='$ongkos_kirim' WHERE id_kota='$id_kota'";
	$sql=mysql_query($query);
				if($sql)
				{
					echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Data Telah Diupdate! </strong>
					</div>';
				}
				else
				{
					echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Update Data Gagal!</strong>
					</div>';
				}
	}
}
	$edit="SELECT * FROM kota WHERE id_kota='".$_GET['id']."'";
	$query=mysql_query($edit);
	while($data=mysql_fetch_array($query))
	{
		$id_kota=$data['id_kota'];
		$nama_kota=$data['nama_kota'];
		$ongkos_kirim=$data['ongkos_kirim'];
	}
?>
<div class="secondary-masthead">
	<div class="container">
		<ul class="breadcrumb">
			<li>
			<a href="#">Dashboard</a> <span class="divider">/</span>
			</li>
			<li class="active">Ongkos Kirim</li> <span class="divider">/</span>
			</li>
			<li class="active">Edit</li>
		</ul>		
	</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span6">
				<form action="" method="post" class="form-horizontal" name="form">
						<legend><strong>Edit Data Ongkos Kirim</strong></legend>
				</div>
					<div class="span6 listing-buttons">
						<a href="?modul=ongkos_kirim" class="btn btn-primary">Kembali</a>
					</div>
	<div class="span12">
			<div class="control-group">
				<label class="control-label" for="id_kota">Id Kota</label>
					<div class="controls">
					<input type="text" class="input-mini" value="<?php echo $id_kota; ?>" name="id_kota" readonly="readonly">
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['errnama_kota'])) ? 'warning' : ''; ?>">
				<label class="control-label" for="nama-kategori">Nama Kota</label>
					<div class="controls">
					<input type="text" value="<?php echo $nama_kota; ?>" name="nama_kota" >
					<span class="help-inline"><?php echo (isset($error['errnama_kota'])) ? $error['errnama_kota'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['errongkos_kirim'])) ? 'warning' : ''; ?>">
				<label class="control-label" for="ongkos-kirim">Ongkos Kirim</label>
					<div class="controls">
					<input type="text" value="<?php echo $ongkos_kirim; ?>" name="ongkos_kirim" >
					<span class="help-inline"><?php echo (isset($error['errongkos_kirim'])) ? $error['errongkos_kirim'] : ''; ?></span>
					</div>
			</div>
			<div class="control-action">
				<div class="controls">
					<input name="bkirim" type="submit" id="bkirim" class="btn btn-success" value="Simpan "/>
					<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
				</div>
			</div>
		</form>
</div>
	</div>
