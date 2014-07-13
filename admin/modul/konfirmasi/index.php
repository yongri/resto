<?php switch ($_GET['action']) : ?>
<?php case 'lihat' : 
	include'lihat_konfirmasi.php'; ?>
<?php break; ?>
<?php default : ?>
<div class="secondary-masthead">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a> <span class="divider">/</span>
				</li>
				<li class="active">Konfirmasi Pembayaran</li>
			</ul>
		</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
		<div class="row">
				<div class="span6">
					<h2>Data Konfirmasi Pembayaran</h2>
				</div>
				<div class="span6 listing-buttons">
					
				</div>
				<div class="span12">
					<div class="slate">
						<table class="orders-table table">
						<thead>
							<tr>
								<th>Id Pesan</th>
								<th>Bank Transfer</th>
								<th>No.Rekening</th>
								<th>Status</th>
								<th class="actions">Actions</th>
							</tr>
						</thead>
						<tbody>	
				<?php
				$batas=3;
				$halaman=$_GET['halaman'];
				if(empty($halaman)){
				$posisi=0;
				$halaman=1;
				}
				else
				{
				$posisi=($halaman-1)*$batas;
				}
				$pilih = "SELECT * FROM konfirmasi LIMIT $posisi,$batas";
				$tampil = mysql_query($pilih);
				while($data=mysql_fetch_array($tampil)) 
				{
				?>
				<tr>
				<td><?php echo $data['id_transaksi']; ?>
				</td>
				<td><?php echo $data['bank_bayar']; ?>
				</td>
				<td><?php echo $data['no_rek']; ?>
				</td>
				<td><span class="label 
				<?php 
				if($data['status']=='Belum Dicek')
					echo "label-important"; 
				else
					echo "label-success";
				?>"> <?php echo $data['status']; ?></span></td>
				<td class="actions">
				<a class="btn btn-small btn-primary" href="?modul=konfirmasi&action=lihat&id=<?php echo $data['id_transaksi']; ?>">Lihat</a>
				</td>
				</tr>
				<?php } ?>
						</tbody>
						</table>
				</div>
			</div>
				
				<div class="span6">
					<div class="pagination pull-left">
						<ul>
							<?php 
							$tampil2="SELECT * FROM konfirmasi ORDER BY id_transaksi DESC";
							$hasil2=mysql_query($tampil2);
							$jmldata=mysql_num_rows($hasil2);
							$jmlhalaman=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlhalaman;$i++)
								if($i!=$halaman)
								{
									echo '<li><a href="?modul=konfirmasi&halaman='.$i.'">'.$i.'</a></li>';
								}
								else
								{
									echo '<li class="active"><a href="#">'.$i.'</a></li>';
								}
							?>
						</ul>
					</div>
				</div>
		</div>
<?php endswitch; ?>			
			<div class="row">
				<div class="span12 footer">
					<p>&copy; 2014 Resto Matahari jaya- By Reyan</p>
				</div>
			</div>			
		</div><!-- #container -->
	</div><!-- end .main-area -->