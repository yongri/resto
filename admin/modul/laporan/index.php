<?php
include "../konek.php";
?>
<div class="secondary-masthead">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a> <span class="divider">/</span>
				</li>
				<li class="active">Laporan</li>
			</ul>
		</div>
</div>
<!-- <a href="../admin/data_Menu.php">Laporan Data Menu</a><br>
<a href="../admin/data_member.php">Laporan Data Member</a><br>
<a href="../admin/data_ongkir.php">Laporan Data Ongkos Kirim</a><br>
<a href="../admin/data_pembayaran.php">Laporan Pembayaran Customer</a> -->

</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span6">
						<h2>Data Laporan</h2>
				</div>
					<div class="span12">
						<div class="slate">
							<table class="orders-table table">
							<thead>	
							</thead>
							<tbody>	
							<tr><td>Laporan Data Menu</td><td class="actions"><a class="btn btn-small btn-danger" data-toggle="modal" href="../admin/data_Menu.php" target="_blank">Lihat</a></td></tr>
							<tr><td>Laporan Data Member</td><td class="actions"><a class="btn btn-small btn-danger" data-toggle="modal" href="../admin/data_member.php" target="_blank">Lihat</a></td></tr>
							<tr><td>Laporan Data Ongkos Kirim</td><td class="actions"><a class="btn btn-small btn-danger" data-toggle="modal" href="../admin/data_ongkir.php" target="_blank">Lihat</a></td></tr>
							<tr><td>Laporan Pembayaran Customer</td><td class="actions"><a class="btn btn-small btn-danger" data-toggle="modal" href="../admin/data_pembayaran.php" target="_blank">Lihat</a></td></tr>
							</tbody>
							</table>						
						</div>
					</div>
			</div>
			<div class="row">
					<div class="span12 footer">
						<p>&copy; 2014 Resto Matahari jaya- By Reyan</p>
					</div>
			</div>		
		</div><!-- #container -->
	</div><!-- end .main-area -->