<?php
session_start();
include "konek.php";
include "header.php";
include "sisi_kiri.php";
?>
<div class="span6 tengah">
<div class="row-fluid kosong"></div>
	<form action="" method="post" class="form-horizontal" name="form">
		<fieldset>
		<legend><strong>Silahkan Isi Testimoni Anda</strong></legend>
		<div class="control-group <?php echo (isset($error['errNama'])) ? 'warning' : ''; ?>" id="c-nama">
			<label class="control-label" for="nama">Nama</label>
			<div class="controls">
				<input type="text" value="" id="nama" name="nama">
				<span class="help-inline"><?php echo (isset($error['errNama'])) ? $error['errNama'] : ''; ?></span>
			</div>
		</div>
		<div class="control-group <?php echo (isset($error['errTestimoni'])) ? 'warning' : ''; ?>" id="c-testimoni">
			<label class="control-label" for="user">Testimoni</label>
			<div class="controls">
				<textarea name="testimoni" cols="45" rows="5"></textarea>  
				<span class="help-inline"><?php echo (isset($error['errTestimoni'])) ? $error['errTestimoni'] : ''; ?></span>
			</div>
		</div>
		<div class="control-action">
			<div class="controls">
				<input name="bkirim" type="submit" class="btn btn-primary" value="Kirim" />
			</div>
		</div>
		</fieldset>
</form>
</div>
			
	<?php
		include"footer.php";
	?>