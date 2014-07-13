<?php
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
?>
<div class="span6 tengah">
		<div class="row-fluid kosong"></div>
			<div class="well row-fluid isi">
	<form action="" method="post" class="form-horizontal">
		<fieldset>
			<legend><strong>Masuk ke Akun Anda</strong></legend>
			<p>Silahkan masukkan Username dan password Anda. Bila belum punya akun, Register <a href="signup.php">disini.</a></p> 
		<?php	
if ($_POST)
{
	// validasi input
	if (empty($_POST['user']))
	{
		$error['errUser']="Username harus diisi";	
	}
	else
	{
		$user=$_POST['user'];
	}
	if (empty($_POST['passwd']))
	{
		$error['errPasswd']="Password harus diisi";	
	}
	else
	{
		$password=md5($_POST['passwd']);	
	}
	
	// jika tidak ada error
	if (!$error)
	{
		//$sql ="SELECT * FROM member WHERE username='$user' AND password='$password'";
		$sql = "SELECT member.*, kota.ongkos_kirim FROM member,kota WHERE member.id_kota = kota.id_kota AND username='$user' AND password='$password'";
		$query = mysql_query($sql);
		//echo $sql;	
		$find = mysql_num_rows($query);
		$data = mysql_fetch_array($query);
		if ($find > 0) // jika user dan password benar, maka login berhasil
		{
			
			//$_SESSION['id_session'] = session_id();
			$_SESSION['id_member'] 		= $data['id_member'];
			$_SESSION['nama_lengkap'] 	= $data['nama_lengkap'];
			$_SESSION['username'] 		= $data['username'];
			$_SESSION['email'] 			= $data['email'];
			$_SESSION['password'] 		= $data['password'];
			$_SESSION['id_kota'] 		= $data['id_kota'];
			$_SESSION['ongkos_kirim'] 	= $data['ongkos_kirim'];
			
					if(isset($_GET['redirect']))
			{
				echo'<meta http-equiv="refresh" content="2; url=keranjang_belanja.php">';
				
			}
			else
			{
				echo'<meta http-equiv="refresh" content="2; url=index.php">';
			}
		}
		else // jika gagal, buat variabel error
		{
			//echo"<script>alert('Login gagal, username atau password Anda salah!'); window.location= 'login.php'</script>";
			echo'<div class=alert>
			<button type=button class=close data-dismiss=alert>&times;</button>
			<strong>Username atau password Anda salah!</strong>
			</div>';
		}
	
	}
}
?>
				<div class="control-group <?php echo (isset($error['errUser'])) ? 'warning' : ''; ?>" id="c-username">
					<label class="control-label" for="username">Username</label>
						<div class="controls">
						<input type="text" name="user" value="<?php echo (isset($user)) ? $user : ''; ?>">
						<span class="help-inline"><?php echo (isset($error['errUser'])) ? $error['errUser'] : '';?></span>
						</div>
				</div>
				<div class="control-group  <?php echo (isset($error['errPasswd'])) ? 'warning' : ''; ?>" id="c-password">
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" value="<?php echo (isset($password)) ? $password : ''; ?>" id="passwd" name="passwd">
						<span class="help-inline"><?php echo (isset($error['errPasswd'])) ? $error['errPasswd'] : ''; ?></span>  
					</div>
				</div>
				<div class="control-action" id="c-kirim">
					<div class="controls">
						<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Masuk" />
						<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" /> 
					</div>
				</div>
		</fieldset>
	</form>
</div>
</div>
<?php
include"footer.php";
?>
