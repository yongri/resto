<div class="secondary-masthead">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="#">Admin</a> <span class="divider">/</span>
				</li>
				<li class="active">Dashboard</li>
			</ul>
		
		</div>
	</div>
	<div class="main-area dashboard">
		<div class="container">
			<div class="row">
				<div class="span12">
				<p> Hai <b> <?php echo $_SESSION['username']; ?> </b>, selamat datang di halaman Administrator.
						Silahkan klik menu pilihan yang berada di atas untuk mengelola konten website anda. </p>
					<div class="slate clearfix">					
						<a class="stat-column" href="?modul=pemesanan&index.php">
							<?php 
							//$sql="SELECT * FROM transaksi WHERE id_member='" . $_SESSION['id_member'] . "'";
							$sql="SELECT * FROM transaksi";
							$query=mysql_query($sql);
							$jumlah=mysql_num_rows($query);
							?>
							<span class="number"><?php echo $jumlah; ?></span>
							<span>Pemesanan</span>';
							
						</a>
					
						<a class="stat-column" href="?modul=member&index.php">
							<?php
							$sql="SELECT * FROM member"; 
							$query=mysql_query($sql);
							$jumlah=mysql_num_rows($query);
							?>
							<span class="number"><?php echo $jumlah; ?></span>
							<span>Anggota</span>
							
						</a>
					
						<a class="stat-column" href="?modul=konfirmasi&index.php">
							<?php
							$sql="SELECT nominal_bayar FROM konfirmasi";
							$query=mysql_query($sql);
							while($row=mysql_fetch_array($query))
							{
							$subtotal=$row['nominal_bayar'];
							$total=$total+$subtotal;
							}
							?>
							<span class="number"><?php echo 'Rp'.$total; ?></span>
							<span>Total Pendapatan</span>
							
						</a>
					
						<a class="stat-column" href="?modul=kontak&index.php">
							<?php
							$sql="SELECT * FROM kontak"; 
							$query=mysql_query($sql);
							$jumlah=mysql_num_rows($query);
							?>
							<span class="number"><?php echo $jumlah; ?></span>
							<span>Kontak dari Customer</span>
							
						</a>
					</div> 
				
				</div>
			
			</div>
			
			<div class="row">
		<!--		<div class="span6">
					<div class="slate">
						<div class="page-header">
							<h2><i class="icon-envelope-alt pull-right"></i>Enquiries</h2>
						</div>
					
						<table class="orders-table table">
						<tbody>
							<tr>
								<td><a href="">Customer enquiry</a> <span class="label label-info">New</span></td>
								<td class="date">Today at 12:01</td>
							</tr>
							<tr>
								<td><a href="">Another customer enquiry</a> <span class="label label-info">New</span></td>
								<td class="date">Yesterday at 16:34</td>
							</tr>
							<tr>
								<td><a href="">A third customer enquiry</a></td>
								<td class="date">22nd June 2012</td>
							</tr>
							<tr>
								<td><a href="">This customer enquiry spans onto two lines so we can see what it will look like</a></td>
								<td class="date">21st June 2012</td>
							</tr>
							<tr>
								<td><a href="">A final customer enquiry</a></td>
								<td class="date">20th June 2012</td>
							</tr>
							<tr>
								<td colspan="2"><a href="">View more enquiries</a></td>
							</tr>
						</tbody>
						</table>
					</div>
				</div> 
				<div class="span6">
					<div class="slate">
						<div class="page-header">
							<h2><i class="icon-shopping-cart pull-right"></i>transaksian Terakhir</h2>
						</div>
						
						<table class="orders-table table">
						<tbody>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label label-info">Paid</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label label-success">Dispatched</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label label-important">Refunded</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label">Awaiting Payment</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label label-inverse">Failed</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label label-warning">Cancelled</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td><a href="">#12345 - Joe Bloggs</a> <span class="label label-info">Paid</span></td>
								<td>$112.00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="">View more orders</a></td>
							</tr>
						</tbody>
						</table>
					</div>
				</div> -->
			</div>
			<div class="row">
				<div class="span12 footer">
					<p>&copy; Restaurant Matahari Jaya 2014- By Muhamad Reyan</p>
				</div>
			</div>			
		</div><!-- #container -->
	</div><!-- end .main-area -->