<?php
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
$id_member=$_GET['id']; 
$sql="SELECT * FROM member WHERE id_member='{$id_member}'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
?>


<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi"> 
		<form action="" method="post" class="form-horizontal" name="form">
		<fieldset>
		<legend><strong>Ubah Profil Anda Di sini.</strong></legend>
			<?php
			if (isset($_POST['bkirim']))
			{
				//$id_member=$_POST['id'];
				if(empty($_POST['name']))
				{
					$error['errNama']='Nama harus diisi';
				}
				else
				{
					$nama=$_POST['name'];
				}
				if(empty($_POST['username']))
				{
					$error['errUsername']='Username harus diisi';
				}
				else
				{
					$username=$_POST['username'];
				}
				if(empty($_POST['mail']))
				{
					$error['errMail']='Email harus diisi';
				}
				else
				{
					//validasi format email
					if ( ! preg_match("/^([a-zA-z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$_POST['mail']))
					{
						$error['errMail']='Masukan alamat Email yang valid';
					}
					$email = $_POST['mail'];
				}
				if(empty($_POST['alamat']))
				{
					$error['errAlamat']='Alamat harus diisi';
				}
				else
				{
					$almt=$_POST['alamat'];
				}
				if(empty($_POST['cmbKota']))
				{
					$error['errKota']='Pilih Asal Kota Anda';
				}
				else
				{
					$kota=$_POST['cmbKota'];
				}
				if(empty($_POST['kd_pos']))
				{
					$error['errKode_Pos']='Kode Pos harus diisi';
				}
				else
				{
					$kdpos=$_POST['kd_pos'];
				}
				
				if(empty($_POST['telepon']))
				{
					$error['errTelepon']='Telepon harus diisi';
				}
				else
				{
					$tlp=$_POST['telepon'];
				}
				if(empty($error))
				{	
							$sql="UPDATE member SET nama_lengkap='$nama',username='$username',email='$email',alamat='$almt',id_kota='$kota',kode_pos='$kdpos',telpon='$tlp' WHERE id_member='".$_SESSION['id_member']."'";
							$query=mysql_query($sql);
							//echo $sql;
							if ($query)
							{
								echo '<div class="alert">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Data Anda Telah Berhasil di Update.</strong>
									</div>';
							}
							else{
								echo '<div class="alert">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Update Data Gagal!</strong>
									</div>';
								}
				}
}
		$sql="SELECT * FROM member a, kota b WHERE a.id_kota = b.id_kota AND id_member='$id_member'";
		//echo $sql;
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{
			$nama	  =$data['nama_lengkap'];
			$username =$data['username'];
			$email    =$data['email'];
			$almt     =$data['alamat'];
			$nama_kota=$data['nama_kota'];
			$kdpos    =$data['kode_pos'];
			$tlp      =$data['telpon'];
		} 
		// ambil data kota dari tabel kota
	$sql = "SELECT id_kota, nama_kota FROM kota ORDER BY nama_kota";
	$getComboKota = mysql_query($sql) or die ('Query Gagal');

?>
		
		<div class="control-group <?php echo (isset($error['errNama'])) ? 'warning' : ''; ?>" id="nama">
			<label class="control-label" for="nama">Nama Lengkap</label>
			<div class="controls">
				<input type="text" value="<?php echo $nama; ?>" name="name">
				<span class="help-inline"><?php echo (isset($error['errNama'])) ? $error['errNama'] : ''; ?></span>
			
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errUsername'])) ? 'warning' : ''; ?>" id="user">
			<label class="control-label" for="user">Username*</label>
			<div class="controls">
				<input type="text" value="<?php echo $username; ?>"  name="username">
				<span class="help-inline"><?php echo (isset($error['errUsername'])) ? $error['errUsername'] : ''; ?></span>
				 
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errMail'])) ? 'warning' : ''; ?>" id="email">
			<label class="control-label" for="email">E-mail*</label>
			<div class="controls">
				<input type="email" value="<?php echo $email; ?>" name="mail">
				<span class="help-inline"><?php echo (isset($error['errMail'])) ? $error['errMail'] : ''; ?></span>
	 
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errTelepon'])) ? 'warning' : ''; ?>" id="telpon">
			<label class="control-label" for="telepon">Telepon</label>
			<div class="controls">
				<input type="text" value="<?php echo $tlp; ?>"  name="telepon">
				<span class="help-inline"><?php echo (isset($error['errTelepon'])) ? $error['errTelepon'] : ''; ?></span> 
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errAlamat'])) ? 'warning' : ''; ?>" id="alamat">
			<label class="control-label" for="alamat">Alamat</label>
			<div class="controls">
				<textarea name="alamat"  cols="45" rows="5"><?php echo $almt; ?></textarea>
				<span class="help-inline"><?php echo (isset($error['errAlamat'])) ? $error['errAlamat'] : ''; ?></span> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="negara">Kota</label>
			<div class="controls">
				<select name=cmbKota id="cmbKota">
				<option value="<?php echo $nama_kota; ?>"><?php echo $nama_kota; ?></option>
				<?php
				while($data = mysql_fetch_array($getComboKota)){
					echo '<option value="'.$data['id_kota'].'">'.$data['nama_kota'].'</option>';
				}
				?>
				</select>
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errKode_Pos'])) ? 'warning' : ''; ?>" id="kode_pos">
			<label class="control-label" for="kode_pos">Kode Pos</label>
			<div class="controls">
				<input type="text" class="input-mini required" value="<?php echo $kdpos; ?>" name="kd_pos">
				<span class="help-inline"><?php echo (isset($error['errKode_Pos'])) ? $error['errKode_Pos'] : ''; ?></span>
			</div>
		</div>
		<div class="control-action">
			<div class="controls">
				<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Simpan" />
				<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
			</div>
		</div>
		</fieldset>
	</form>
	</div>
</div>
</div>
</div>
<?php include"footer.php";
?>
