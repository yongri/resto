<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="SHORCUT ICON" ilo-full-src="assets/img/J.png" href="assets/img/J.png" type="image/x-icon">
		<title>Restaurant Matahari Jaya</title>

		<!-- css -->
	<!--	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css"> -->
	<!--	<link href="assets/css/default.css" rel="stylesheet" type="text/css" media="all" /> -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">

		<!-- javascript -->
		<script src="assets/js/jquery-1.9.0.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script>
		function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;

  return true;
}
</script>
	</head>
	<body>
	<div class="container-narrow">
			<div class="row-fluid informasi">
						<div class="span12"><img src="assets/img/header.jpg"></div>
						<div class="span6"><marquee><h5><b><?php include "tanggal.php"; ?> , Selamat Datang di Restaurant Kami..</b></h5></marquee>
						</div>
			</div>
			    <div class="navbar navbar-inverse">
					<div class="navbar-inner">
						<div class="container-fluid">
							<ul class="nav">
								<li class="active"><a href="index.php"><i class=" icon-home"></i>Beranda</a></li>
									<li><a href="profil.php">Profil</a></li>
									<li class="dropdown" id="menu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="menu.php">Menu
										<b class="caret"></b>
									</a>
										<ul class="dropdown-menu">
										<li><a href="masakan_indo.php">Masakan Indonesia</a></li>
										<li><a href="masakan_china.php">Masakan Chinese</a></li>
										</ul>
									</li>
									<li><a href="cara_pemesanan.php">Cara Pemesanan</a></li>
									<li><a href="kontak.php">Kontak Kami</a></li>
									<li><a href="artikel.php">Artikel</a></li>
							</ul>
								<form class="navbar-search pull-right" action="cari.php" method="POST">
								<input type="text" class="search-query" name="pencarian" placeholder="Pencarian">
								</form>
						</div>
					</div>
				</div>