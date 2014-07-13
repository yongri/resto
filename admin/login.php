<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="SHORCUT ICON" ilo-full-src="../assets/img/favicon.i" href="../assets/img/favicon.ico" type="image/x-icon">
		<title>Administrator Restaurant Matahari Jaya</title>
		<!-- css -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css">
		<!-- javascript -->		
		<script src="../assets/js/bootstrap.min.js"></script>
		</head>
	<body>
<div class="span6 tengah">
	<form class="form-signin" method="post" action="cek_login.php">
			<fieldset>
				<legend><h3 class="form-signin-heading">Login Admin</h3></legend>
					<div class="control-group <?php echo (isset($error['errUsername'])) ? 'warning' : ''; ?>" id="c-username">
						<label class="control-label" for="username">Username</label>
							<div class="controls">
							<input type="text" class="input-block-level" name="username"  value="<?php echo (isset($username)) ? $username : ''; ?>" required>
							<!--<span class="help-inline"><?php echo (isset($error['errUsername'])) ? $error['errUsername'] : '';?></span>
							--></div>
					</div>
					<div class="control-group  <?php echo (isset($error['errPassword'])) ? 'warning' : ''; ?>" id="c-password">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" class="input-block-level" name="password" required>
						<!--	<span class="help-inline"><?php echo (isset($error['errPassword'])) ? $error['errPassword'] : ''; ?></span>  
						--></div>
					</div>
					<div class="control-action <?php echo (isset($error['login'])) ? 'warning' : ''; ?>" id="c-kirim">
					<div class="controls">
						<input name="bkirim" type="submit" id="bkirim" class="btn btn-primary" value="Masuk" />
						<input type="reset" name="bbatal" id="bbatal" class="btn" value="Batal" />
						<!--<span class="help-inline"><?php echo (isset($error['login'])) ? $error['login'] : ''; ?></span> 
					--></div>
					
				</div>
			</fieldset>
	</form>		
</div> <!-- /container -->
	
	</body>
</html>
