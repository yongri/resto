<?php
session_start();
include 'konek.php';
include 'header.php';
include 'sisi_kiri.php';
	
if ($_POST)
{
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
	if(empty($_POST['passwd']))
	{
		$error['errPasswd']='Password harus diisi';
	}
	else
	{
		if(strlen($_POST['passwd'])<6)
		{
			$error['errPasswd']='Password Minimal 6 Karakter';
		}
		else
		{
			$password=$_POST['passwd'];
		}
		$place['passwd']=$_POST['passwd'];
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
}
// ambil data kota
	$sql = "SELECT * FROM kota ORDER BY nama_kota";
	$getComboKota = mysql_query($sql) or die ('Query Gagal');
?>

<div class="span6 tengah">
<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi"> 
	<form action="" method="post" class="form-horizontal" onsubmit="return cekNumerik()" name="form1">
		<fieldset>
		<legend><strong>Form Pendaftaran Anggota</strong></legend>
		<?php
if ( $_POST && empty($error))
{
	$sql= "SELECT email FROM member WHERE email='$email'";
	$query= mysql_query($sql);
	if (mysql_num_rows($query) > 0)
	{
		echo'<div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Email sudah terdaftar, silahkan login dengan menggunakan Username & Password Anda.</strong>
		</div>';
	}
	else
	{	
			$password=md5($password);
			// input ke database
			$sql="INSERT INTO member VALUES ('','$username','$password','$nama','$almt','$email','$tlp','$kota','$kdpos','Y')";
			$query=mysql_query($sql);
			if ($query) 
				echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Selamat Anda telah terdaftar sebagai anggota Restaurant kami!</strong>
					</div>';
			
			else
				echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Maaf, Anda tidak berhasil terdaftar sebagai member!</strong>
					</div>';
		}
	}	


?>
<p> <em>Field * wajib diisi</em></p><br/>
		<div class="control-group <?php echo (isset($error['errNama'])) ? 'warning' : ''; ?>" id="c-nama">
			<label class="control-label" for="nama">Nama Lengkap</label>
			<div class="controls">
				<input type="text" value="<?php echo (isset($nama)) ? $nama : ''; ?>" id="name" name="name">
				<span class="help-inline"><?php echo (isset($error['errNama'])) ? $error['errNama'] : ''; ?></span>
			
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errUsername'])) ? 'warning' : ''; ?>" id="c-username">
			<label class="control-label" for="user">Username*</label>
			<div class="controls">
				<input type="text" value="<?php echo (isset($username)) ? $username : ''; ?>" id="username" name="username">
				<span class="help-inline"><?php echo (isset($error['errUsername'])) ? $error['errUsername'] : ''; ?></span>
				 
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errMail'])) ? 'warning' : ''; ?>" id="c-email">
			<label class="control-label" for="email">E-mail*</label>
			<div class="controls">
				<input type="email" value="<?php echo (isset($email)) ? $email : ''; ?>" id="mail" name="mail">
				<span class="help-inline"><?php echo (isset($error['errMail'])) ? $error['errMail'] : ''; ?></span>
	 
			</div>
		</div>
		<div class="control-group  <?php echo (isset($error['errPasswd'])) ? 'warning' : ''; ?>" id="c-password">
			<label class="control-label" for="password">Password*</label>
			<div class="controls">
				<input type="password" value="" id="passwd" name="passwd">
				<span class="help-inline"><?php echo (isset($error['errPasswd'])) ? $error['errPasswd'] : ''; ?></span> 
			</div>
			
		</div>
				<div class="control-group <?php echo (isset($error['errTelepon'])) ? 'warning' : ''; ?>" id="c-telepon">
			<label class="control-label" for="telepon">Telepon</label>
			<div class="controls">
				<input type="text" value="<?php echo (isset($telpon)) ? $telpon : ''; ?>" id="telepon" name="telepon">
				<span class="help-inline"><?php echo (isset($error['errTelepon'])) ? $error['errTelepon'] : ''; ?></span> 
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errAlamat'])) ? 'warning' : ''; ?>" id="c-alamat">
			<label class="control-label" for="alamat">Alamat</label>
			<div class="controls">
				<textarea name="alamat"  cols="45" rows="5"><?php echo (isset($alamat)) ? $alamat : ''; ?></textarea>
				<span class="help-inline"><?php echo (isset($error['errAlamat'])) ? $error['errAlamat'] : ''; ?></span> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="negara">Kota</label>
			<div class="controls">
				<select name=cmbKota id="cmbKota">
				<option value="">--Pilih Kota--</option>
				<?php
				while($data = mysql_fetch_array($getComboKota)){
					echo '<option value="'.$data['id_kota'].'">'.$data['nama_kota'].'</option>';
				}
				?>
				</select>
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errKode_Pos'])) ? 'warning' : ''; ?>" id="c-KdPos">
			<label class="control-label" for="postcode">Kode Pos</label>
			<div class="controls">
				<input type="text" class="input-mini required" value="<?php echo (isset($kdpos)) ? $kdpos : ''; ?>" name="kd_pos">
				<span class="help-inline"><?php echo (isset($error['errKode_Pos'])) ? $error['errKode_Pos'] : ''; ?></span>
			</div>
		</div>
		<!-- <p> <input type="checkbox" name="setuju" value="Saya Telah Membaca dan Menyetujui Semua Peraturan yang berlaku di PT.Oremco Online Store"> Saya Telah Membaca dan Menyetujui Semua Peraturan yang berlaku di KoperKu</p> -->
		<div class="control-action">
			<div class="controls">
				<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Daftar" />
				<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
			</div>
		</div>
		</fieldset>
	</form>
	</div>
</div>
</div>
	
<?php

include"footer.php";
?>