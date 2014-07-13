<?php switch ($_GET['action']) : ?>
<?php case 'tambah' : 
	include'tambah.php'; ?>
<?php break; ?>
<?php case 'edit' : 
	include'edit.php'; ?>
<?php break; ?>
<?php case 'hapus' : 
	include'hapus_menu.php'; ?>
<?php break; ?>
<?php default : ?>
<div class="secondary-masthead">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a> <span class="divider">/</span>
				</li>
				<li class="active">Menu</li>
			</ul>
		</div>
</div>
	<div class="main-area dashboard">
		<div class="container">
		<div class="row">
				<div class="span6">
					<h2>Data Menu</h2>
				</div>
				<div class="span6 listing-buttons">
					<a href="?modul=menu&action=tambah" class="btn btn-primary">Tambah Menu</a>
				</div>
				<div class="span12">
					<div class="slate">
						<table class="orders-table table">
						<thead>
							<tr>
								<th>ID Menu</th>
								<th>Nama Menu</th>
								<th class="actions">Actions</th>
							</tr>
						</thead>
						<tbody>	
				<?php
				$batas=8;
				$halaman=$_GET['halaman'];
				if(empty($halaman)){
				$posisi=0;
				$halaman=1;
				}
				else
				{
				$posisi=($halaman-1)*$batas;
				}
				$pilih = "SELECT * FROM menu  LIMIT $posisi,$batas ";
				$tampil = mysql_query($pilih);
				//echo $pilih;
				while($data=mysql_fetch_array($tampil)) 
				{
				?>
				<tr>
				<td><?php echo $data['id_menu']; ?>
				</td>
				<td><?php echo $data['nama_menu']; ?>
				</td>
				<td class="actions">
				<a class="btn btn-small btn-danger" data-toggle="modal" href="?modul=menu&action=hapus&id=<?php echo $data['id_menu']; ?>">Hapus</a>
				<a class="btn btn-small btn-primary" href="?modul=menu&action=edit&id=<?php echo $data['id_menu']; ?>">Ubah</a>
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
							$tampil2="SELECT * FROM menu ORDER BY id_menu DESC";
							$hasil2=mysql_query($tampil2);
							$jmldata=mysql_num_rows($hasil2);
							$jmlhalaman=ceil($jmldata/$batas);
							for($i=1;$i<=$jmlhalaman;$i++)
								if($i!=$halaman)
								{
									echo '<li><a href="?modul=menu&halaman='.$i.'">'.$i.'</a></li>';
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