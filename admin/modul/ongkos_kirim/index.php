<?php switch ($_GET['action']) : ?>
<?php case 'tambah' : 
	include'tambah_ongkir.php'; ?>
<?php break; ?>
<?php case 'edit' : 
	include'edit_ongkir.php'; ?>
<?php break; ?>
<?php case 'hapus' : 
	include'hapus_ongkir.php'; ?>
<?php break; ?>
<?php default : ?>
<div class="secondary-masthead">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a> <span class="divider">/</span>
				</li>
				<li class="active">Ongkos Kirim</li>
				</ul>
				</div>
</div>	
<div class="main-area dashboard">
		<div class="container">
		<div class="row">
				<div class="span6">
				<h2>Data Ongkos Kirim</h2>
				</div>
				<div class="span6 listing-buttons">
					<a href="?modul=ongkos_kirim&action=tambah" class="btn btn-primary">Tambah Ongkos Kirim</a>
				</div>
				<div class="span12">
					<div class="slate">
						<table class="orders-table table">
						<thead>
							<tr>
								<th>ID Kota</th>
								<th>Nama Kota</th>
								<th>Ongkos Kirim</th>
								<th class="actions">Actions</th>
							</tr>
						</thead>
						<tbody>	
				<?php
				$batas=23;
				$halaman=$_GET['halaman'];
				if(empty($halaman)){
				$posisi=0;
				$halaman=1;
				}
				else
				{
				$posisi=($halaman-1)*$batas;
				}
				$pilih = "SELECT * FROM kota";
				if($_GET['id_negara']!='') 
					$pilih .= " WHERE id_negara = '".$_GET['id_negara']."'";
				$pilih .= " LIMIT $posisi,$batas";
				$tampil = mysql_query($pilih);
				while($data=mysql_fetch_array($tampil)) 
				{
				?>
				<tr>
				<td><?php echo $data['id_kota']; ?></td>
				<td><?php echo $data['nama_kota']; ?></td>
				<td><?php echo $data['ongkos_kirim']; ?></td>
				<td class="actions">
				<a class="btn btn-small btn-danger" data-toggle="modal" href="?modul=ongkos_kirim&action=hapus&id=<?php echo $data['id_kota']; ?>">Hapus</a>
				<a class="btn btn-small btn-primary" href="?modul=ongkos_kirim&action=edit&id=<?php echo $data['id_kota']; ?>">Ubah</a>
				</td>
				</tr>
				<?php } ?>
						</tbody>
						</table>
				</div>
			</div>
				<div class="modal hide fade" id="removeItem">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h3>Remove Item</h3>
					</div>
					<div class="modal-body">
						<p>Anda Yakin Mau Menghapus Data ini?</p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Tutup</a>
						<a href="?modul=ongkos_kirim&action=hapus&id=<?php echo $data['id_kota']; ?>" class="btn btn-danger">Hapus</a>
					</div>
				</div>
				
				<div class="span6">
					<div class="pagination pull-left">
						<ul>
							<?php 
							$tampil2="SELECT * FROM kota ";
							if($_GET['id_negara']!='') 
								$tampil2 .= " WHERE id_negara = '".$_GET['id_negara']."'";
							$tampil2 .= " ORDER BY id_kota DESC";
							$hasil2=mysql_query($tampil2);
							$jmldata=mysql_num_rows($hasil2);
							$jmlhalaman=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlhalaman;$i++)
								if($i!=$halaman)
								{
									echo '<li><a href="?modul=ongkos_kirim&halaman='.$i.'">'.$i.'</a></li>';
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
