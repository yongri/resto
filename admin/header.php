<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="SHORCUT ICON" ilo-full-src="../assets/img/4.png" href="../assets/img/4.png" type="image/x-icon">
	<title>Administrator Restaurant Matahari Jaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
	
	<!-- Javascript -->
	<script src="../assets/js/jquery-1.9.0.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>

<script type="text/Javascript">
function cekNumerik()
{
	//membaca nilai dari input form (komponen bernama 'harga_barang' & stok) dan disimpan sbg var
	var x = document.form1.harga_barang.value;
	var y = document.form1.stok.value;
	//membuat daftar karakter '0' s/d '9' dalam array
	var list=new Array("0","1","2","3","4","5","6","7","8","9");
	//nilai awal status
	var status=true;
	//proses pengecekan tiap karakter dalam string
	//looping dilakukan sebanyak jumlah karakter dalam string
	for(i=0;i<=x.length-1;i++)
	{
		//jika karakter ke-i termasuk dalam array, maka nilainya true
		//sedang jika tidak, nilai false
		if(x[i] in list) cek=true;
		else
		cek=false;
		//kenakan operasi AND
		status=status && cek;
	}
	for(i=0;i<=y.length-1;i++)
	{
		//jika karakter ke-i termasuk dalam array, maka nilainya true
		//sedang jika tidak, nilai false
		if(y[i] in list) cek=true;
		else
		cek=false;
		//kenakan operasi AND
		status=status && cek;
	}
	if(status==false)
	{
		//jika status akhir bernilai false, maka munculkan kotak peringatan
		//dan akan mengembalikan nilai false
		alert("Isikan Harga dan stok dengan Angka!");
		return false;
	}
	else
	{
		//sedang jika status akhir true, maka akan mengembalikan nilai true
		return true;
	}
}
</script>
</head>    
<body>
	<div class="masthead">
		<div class="container">
			<div class="masthead-top clearfix">
				<ul class="nav nav-pills pull-right">
					<li>
						<a href="../index.php"><i class="icon-globe"></i> Lihat Website</a>
					</li>
					<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class='icon-user icon-large'></i><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>
					<b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
				<h1><img src="../assets/img/logo.png" width="80px" height="50px"> &nbsp;&nbsp;&nbsp;Restaurant Matahari Jaya - Administrator</h1>
			</div>
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container">
					
						<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						
						<div class="nav-collapse">
						<ul class="nav">
							<li class="active">
								<a href="dashboard.php"><i class="icon-home"></i> Dashboard</a>
							</li>
							<li>
								<a href="?modul=menu"><i class="icon-group"></i>Menu</a>
							</li>
								<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cogs"></i> Pesanan <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="?modul=pemesanan">Data Pemesanan</a></li>
									<li><a href="?modul=konfirmasi">Konfirmasi Pembayaran</a></li>
								</ul>
							</li>
							<li>
								<a href="?modul=member"><i class="icon-cogs"></i> Member</a>
							</li>
							<li>
								<a href="?modul=laporan"><i class="icon-signal"></i> Laporan</a>
							
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-inbox"></i> Kontak Kami <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="?modul=kontak">Data Kontak Customer</a></li>
								</ul>
							</li>
							<li>
								<a href="?modul=ongkos_kirim"><i class="icon-inbox"></i> Ongkos Kirim</a>
							</li>
						</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
