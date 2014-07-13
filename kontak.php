<?php
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
include "picture_box.php";

?>
<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
		<div class="well row-fluid isi">
		<form action="" method="post" class="form-horizontal ">
		<fieldset>
			<legend><strong>HUBUNGI KAMI </strong></legend>
			<h5><strong>Silahkan isi form di bawah ini jika Anda ada pertanyaan atau saran mengenai menu dan restoran kami!</strong></h5>
					<?php
		if ($_POST)
{		// validasi input
	if (empty($_POST['name']))
	{
		$error['errNama']="nama harus diisi";	
	}
	else
	{
		$nama=$_POST['name'];
	}
	if (empty($_POST['email']))
	{
		$error['errEmail']="email harus diisi";	
	}
	else
	{
		$email=$_POST['email'];	
	}
	if (empty($_POST['subjek']))
	{
	$error['errSubjek']="Subjek harus diisi";	
	}
	else
	{
	$subjek=$_POST['subjek'];
	}
	if (empty($_POST['pesan']))
	{
	$error['errPesan']="Pesan harus diisi";	
	}
	else
	{
	$pesan=$_POST['pesan'];	
	}
if ( empty($error))
		{	
			//$nama=$_POST['name'];
			//$email=$_POST['email'];
			//$subjek=$_POST['subjek'];
			//$pesan=$_POST['pesan'];
			//$tanggal=date('Y').'-'.date('m').'-'.date('d');

			$input="insert into kontak values('$id_kontak','$pesan',CURDATE(),'$nama','$email','$subjek')";
			$perintah=mysql_query($input);
			
			if($perintah)
			echo'
			<div class=alert>
			<button type=button class=close data-dismiss=alert>&times;</button>
			<strong>Komentar Anda Terkirim. Terima Kasih!</strong>
			</div>';
			else
			echo'<div class=alert>
			<button type=button class=close data-dismiss=alert>&times;</button>
			<strong>Komentar Anda Tidak Terkirim!</strong>
			</div>';
		}
}
?>
				<div class="control-group <?php echo (isset($error['errNama'])) ? 'warning' : ''; ?>" id="c-nama">
					<label class="control-label" for="nama">Nama</label>
						<div class="controls">
						<input type="text" value="<?php echo (isset($nama)) ? $nama : ''; ?>" id="name" name="name">
						<span class="help-inline"><?php echo (isset($error['errNama'])) ? $error['errNama'] : ''; ?></span>
						</div>
				</div>
				<div class="control-group <?php echo (isset($error['errEmail'])) ? 'warning' : ''; ?>" id="c-email">
					<label class="control-label" for="email">E-mail</label>
						<div class="controls">
						<input type="email" value="<?php echo (isset($email)) ? $email : ''; ?>" id="email" name="email">
						<span class="help-inline"><?php echo (isset($error['errEmail'])) ? $error['errEmail'] : ''; ?></span>
						</div>
				</div>
				<div class="control-group <?php echo (isset($error['errSubjek'])) ? 'warning' : ''; ?>" id="c-subjek">
					<label class="control-label" for="subjek">Subjek</label>
						<div class="controls">
						<input type="text" value="<?php echo (isset($subjek)) ? $subjek : ''; ?>" id="subjek" name="subjek">
						<span class="help-inline"><?php echo (isset($error['errSubjek'])) ? $error['errSubjek'] : ''; ?></span>
						</div>
				</div>
				<div class="control-group <?php echo (isset($error['errPesan'])) ? 'warning' : ''; ?>" id="c-pesan">
					<label class="control-label" for="pesan">Pesan</label>
					<div class="controls">
					<textarea name="pesan" id="pesan" cols="45" rows="5"><?php echo (isset($pesan)) ? $pesan : ''; ?></textarea>
					<span class="help-inline"><?php echo (isset($error['errPesan'])) ? $error['errPesan'] : ''; ?></span>
					</div>
				</div>
				<div class="control-action">
					<div class="controls">
					<input name="bkirim" type="submit" class="btn btn-primary" value="Kirim" />
					<input type="reset" name="bbatal" class="btn" value="Batal" />
					</div>
				</div>
		</fieldset>
			</form>
			
				</div>
			
				
			
	
	</div>
	
		<?php
		include"footer.php";
		?>
	