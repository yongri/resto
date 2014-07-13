<?php
if (isset($_POST['bkirim']))
{
	$id_menu=$_POST['id_menu'];
	if(empty($_POST['nama_menu']))
	{
		$error['errnama_menu']='Nama Menu harus diisi';
	}
	else
	{
		$nama_menu=$_POST['nama_menu'];
	}
	$kategori=$_POST['kategori'];
	if(empty($_POST['keterangan_Menu']))
	{
		$error['errketerangan_Menu']='keterangan Menu harus diisi';
	}
	else
	{
		$keterangan_menu=$_POST['keterangan_Menu'];
	}
	if(empty($_POST['harga_menu']))
	{
		$error['errharga']='Masukkan harga!';
	}
	else
	{
		$harga_menu=$_POST['harga_menu'];
	}
	if(empty($_POST['stok']))
	{
		$error['errstok']='Masukkan stok!';
	}
	else
	{
		$stok=$_POST['stok'];
	}
	$gambar_menu=$_FILES['gambar_menu']['name'];
	if(empty($error))
	{	
			if(move_uploaded_file($_FILES['gambar_menu']['tmp_name'],"../assets/menu/".$gambar_menu))
			{
				echo "gambar_menu berhasil dikirim ".$gambar_menu;
				$query2="UPDATE menu SET kategori='$kategori',nama_menu='$nama_menu',keterangan_menu='$keterangan_menu',harga_menu='$harga_menu',stok='$stok',gambar_menu='$gambar_menu' WHERE id_menu='$id_menu'";
				$sql2=mysql_query($query2);
				echo $query2; 
			}
			if($sql2)
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
	else
		var_dump($error);
}
	$sql="SELECT * FROM menu WHERE id_menu='".$_GET['id']."'";
	$query=mysql_query($sql);
	$data=mysql_fetch_array($query);
	echo"<form action='' method='post' class='form-horizontal' name='form' enctype='multipart/form-data'>";
				$id_menu		=$data['id_menu'];
				$kategori		=$data['kategori'];
				$nama			=$data['nama_menu'];
				$keterangan_menu=$data['keterangan_menu'];
				$harga_menu		=$data['harga_menu'];
				$stok			=$data['stok_menu'];
				$gambar_menu	=$data['gambar_menu'];
	
?>
<div class="secondary-masthead">
	<div class="container">
		<ul class="breadcrumb">
			<li>
			<a href="#">Dashboard</a> <span class="divider">/</span>
			</li>
			<li class="active">menu</li> <span class="divider">/</span>
			</li>
			<li class="active">Edit</li>
		</ul>		
	</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span6">
						<legend><strong>Edit Data menu</strong></legend>
				</div>
					<div class="span6 listing-buttons">
						<a href="?modul=menu" class="btn btn-primary">Kembali</a>
					</div>
	<div class="span12">
		<div class="control-group">
				<label class="control-label" for="id_menu">Id menu</label>
					<div class="controls">
					<input type="text" value="<?php echo $id_menu; ?> " name="id_menu" readonly="readonly">
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['errnama_menu'])) ? 'warning' : ''; ?>">
				<label class="control-label" for="nama_menu">Nama Menu</label>
					<div class="controls">
					<input type="text" class="span5" value="<?php echo $nama; ?>" name="nama_menu">
					<span class="help-inline"><?php echo (isset($error['errnama_menu'])) ? $error['errnama_menu'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['err_Kategori'])) ? 'warning' : ''; ?>" id="kategori">
				<label class="control-label" for="kategori">Kategori</label>
					<div class="controls">
					<?php echo "
					<select name='kategori'>
						<option value='indonesia' ";
					echo ($kategori=='indonesia') ? 'selected' : '' ; 
					echo ">indonesia </option>
						<option value='chinese' ";
					echo ($kategori=='chinese') ? 'selected' : '' ;
					echo ">chinese </option>
					</select> "; ?>
					<span class="help-inline"><?php echo (isset($error['err_Kategori'])) ? $error['err_Kategori'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['errketerangan_Menu'])) ? 'warning' : ''; ?>">
				<label class="control-label" for="keterangan_Menu">keterangan Menu</label>
					<div class="controls">
					<textarea name="keterangan_Menu" cols="45" rows="5"><?php echo $keterangan_menu; ?></textarea>
					<span class="help-inline"><?php echo (isset($error['errketerangan_Menu'])) ? $error['errketerangan_Menu'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['errsharga_menu'])) ? 'warning' : ''; ?>">
				<label class="control-label" for="harga_menu">harga_menu</label>
					<div class="controls">
					<input type="text" value="<?php echo $harga_menu; ?>" name="harga_menu">
					<span class="help-inline"><?php echo (isset($error['errharga_menu'])) ? $error['errharga_menu'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group <?php echo (isset($error['errstok'])) ? 'warning' : ''; ?>">
				<label class="control-label" for="stok">Stok</label>
					<div class="controls">
					<input type="text" class="input-mini" value="<?php echo $stok; ?>" name="stok">
					<span class="help-inline"><?php echo (isset($error['errstok'])) ? $error['errstok'] : ''; ?></span>
					</div>
			</div>
			<div class="control-group control-group" id='gambar_menu'>
				<label class="control-label" for="gambar_menu">gambar_menu</label>
					<div class="controls">
					<input type="file" value="<?php echo $gambar_menu; ?>" name="gambar_menu">
					<span class="help-inline"><?php echo (isset($error['errgambar_menu'])) ? $error['errgambar_menu'] : ''; ?></span>
					</div>
			</div>
				<div class="control-group control-group" id='gambar_menu'>
				<label class="control-label" for="gambar_menu"></label>
					<div class="controls"><img src="../assets/menu/<?php echo $gambar_menu; ?>" width="100px" height="100px">
					</div>
			</div>
			<div class="control-action">
				<div class="controls">
					<input name="bkirim" type="submit" id="bkirim" class="btn btn-success" value="Simpan" />
					<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
				</div>
			</div>
		
</div>
	</div>
