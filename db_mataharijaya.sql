-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2014 at 12:52 
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mataharijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_amin` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_amin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_amin`, `username`, `password`) VALUES
(1, 'reyan', '654321');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(6) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(60) NOT NULL,
  `deskripsi_artikel` text NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `deskripsi_artikel`, `gambar_artikel`, `tanggal_masuk`) VALUES
(1, 'Pemilihan Bahan Makanan Yang Sehat', 'Perlu diketahui bahwa bahan yang terbaik pada sayuran dan buah-buahan yaitu dengan ditanamnya buah dan sayuran tersebut tanpa pestisida atau sering kita mendengarnya sayuran dan buah organik. Cara untuk memperolehnya sudah bisa dengan mudah melalui pasar swalayan yang sudah menjamur di lingkungan masyarakat. Adapun yang menjadi manfaat dari sayuran dan buah organik yaitu lebih enak dan kelihatan segar, tidak cepat busuk dan tentunya lebih bergizi dan tidak mengandung zat kimia yang berbahaya bagi tubuh manusia. Dan tak ketinggalan akan menjaga kelestarian lingkungan.\r\n\r\n', 'tips1.jpg', '2014-04-18'),
(2, 'Kiat menghindari makanan sehat terdeteksi bakteri', 'Memisahkan bahan makanan mentah yang berupa daging ternak, ikan serta unggas dari bahan makanan lainnya. Kita harus menyimpan bahan makanan tersebut pada wadah yang tertutup rapat. Hal ini memiliki fungsi untuk menghindari kontak bahan makanan mentah terhadap makanan jadi ataupun yang telah dimasak. Karena bahan makanan mentah tersebut masih mengandung mikroorganisme berbahaya dan dapat pula  mencemari bahan makanan lainnya yang bersiap untuk disajikan. Maka dengan terlihat adanya proses kontaminasi bahwa hal tersebut dapat terjadi dimana saja, termasuk diantaranya yaitu pada saat proses pemasakan serta proses penyimpanan.', 'tips2.jpg', '2014-04-18'),
(3, 'Tips makanan sehat dalam memilih sumber makanan untuk anak', '•	Protein\r\nMakanan sehat yang cocok bagi anak-anak untuk nutrisi protein yaitu dengan memberikan telur, susu kedelai atau produk susu yang lain dan beraneka rasanya, serta kacang-kacangan. Dapat diketahui bahwa biji-bijian dan kacang-kacangan sangat bermanfaat bagi asupan kebutuhan protein untuk anak kita.\r\n•	Zat besi\r\nZat besi yang terkandung pada makanan dan baik untuk anak-anak seperti roti ataupun sereal. Keduanya adalah pilihan tepat bagi kebutuhan zat besi pada anak-anak kita. Sedangkan contoh makanan sehat lainnya terdapat pada sayuran yang berwarna hijau, susu kedelai, tahu atau tempe, dan kacang-kacangan. Pada makanan sehat tersebut merupakan sumber zat besi yang terbaik.\r\n', 'tips3.jpg', '2014-04-19'),
(4, 'Cara diet sehat yang alami', '\r\n(a)   Upayakan waktu makan dilakukan dengan enjoy\r\nMakan yang terburu-buru akan menyebabkan perut menjadi tidak cepat kenyang bahkan menjadi penambahan porsi makan juga meningkat. Sehingga kita harus membiasakan untuk makan secara lebih tenang dan lambat agar perut kita terisi dengan benar. Maka perlu ada kemampuan untuk melihat berbagai tips tentang makanan diet yang menyehatkan.\r\n(b)   Makan dengan rutin\r\nCara kedua ini merupakan makan pada saat yang teratur. Hal tersebut bisa membuat pola makan kita menjadi lebih teratur serta dapat pula mengatur porsi makan menjadi normal atau stabil. Maka hendaklah kita menghindari waktu yang bisa menyebabkan telat makan atau lebih awal makan. Karena dengan makan secara tepat, kita mampu dan bisa membantu tubuh agar terhindar dari segala jenis bahaya terutama penyakit yang teridentifikasi oleh tubuh kita.\r\n\r\n', 'tips4.jpg', '2014-04-19'),
(5, 'Cara diet yang sehat dan bermanfaat bagi ibu menyusui', '•	Sebaiknya menyusui bayi hingga sampai usia 2 tahun. Karena ini dapat membantu produksi hormon dan membantu cara diet dalam mengembalikan berat badan menjadi bentuk tubuh yang ideal. Dapat diketahui bahwa ketika menyusui, tubuh ibu menyusui ini akan membakar kalori sekitar 300-500 kkal per hari. Sehingga dapat memacu untuk menurunkan berat badan menjadi tubuh yang langsing.\r\n•	Mengkonsumsi sayuran dan buah-buahan, makanan nutrisi yang berkarbohidrat kompleks dan sumber protein yang disertai dengan minum air putih secukupnya. Selain itu, bisa juga mengkonsumsi susu low fat, telur, ikan, tahu atau tempe dan kacang-kacangan. Hal ini merupakan cara diet yang sangat penting bagi ibu menyusui.\r\n', 'tips5.jpg', '2014-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id_bukutamu` int(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_bukutamu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--


-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_transaksi` int(7) NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(8) NOT NULL,
  `jumlah_beli` int(2) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `detail_transaksi`
--


-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(2) NOT NULL AUTO_INCREMENT,
  `nama_galeri` varchar(30) NOT NULL,
  `keterangan_galeri` text NOT NULL,
  `gambar_galeri` varchar(100) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `galeri`
--


-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_transaksi` int(7) NOT NULL,
  `bank_bayar` varchar(8) NOT NULL,
  `pemilik_rek` varchar(20) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `waktu_transfer` time NOT NULL,
  `nominal_bayar` double NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_transaksi`, `bank_bayar`, `pemilik_rek`, `no_rek`, `tgl_transfer`, `waktu_transfer`, `nominal_bayar`, `status`) VALUES
(1, 'Mandiri', 'Dinda', '0987654321', '2014-07-09', '10:00:00', 25000, 'Sudah Di Check');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(5) NOT NULL AUTO_INCREMENT,
  `isi_pesan` text NOT NULL,
  `tgl` date NOT NULL,
  `nama` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `isi_pesan`, `tgl`, `nama`, `email`, `subjek`) VALUES
(2, 'apa menu yang murah tapi enak?', '2014-07-05', 'susi', 'susi@gmail.com', 'beli yang murah');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(20) NOT NULL,
  `ongkos_kirim` double NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkos_kirim`) VALUES
(37, 'Jakarta', 7000),
(2, 'Bandung', 14000),
(3, 'Semarang', 14000),
(4, 'Medan', 20000),
(5, 'Aceh', 25000),
(6, 'Banjarmasin', 17500),
(7, 'Balikpapan', 18500),
(8, 'Samarinda', 19500),
(9, 'Batam', 24000),
(10, 'Palembang', 23000),
(11, 'Surabaya', 13000),
(12, 'Ambon', 27000),
(13, 'Balaraja', 12000),
(14, 'Bandar Lampung', 17000),
(15, 'Banyuwangi', 16000),
(16, 'Bekasi', 13000),
(17, 'Bengkulu', 20000),
(18, 'Bintaro', 12000),
(19, 'Cikarang', 13500),
(20, 'Ciawi', 14000),
(21, 'Ciputat', 13000),
(22, 'Cirebon', 17000),
(23, 'Denpasar', 21000),
(24, 'Depok', 14000),
(25, 'Jambi', 20000),
(26, 'Jayapura', 30000),
(27, 'Yogyakarta', 17000),
(28, 'Karawang', 14500),
(29, 'Kuningan (Jabar)', 15000),
(30, 'Kuta (Bali)', 21000),
(31, 'Makassar', 22000),
(32, 'Manado', 22500),
(33, 'Tangerang', 14000),
(34, 'Kupang', 26000),
(35, 'Bima', 26000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `nama_lengkap`, `alamat`, `email`, `telpon`, `id_kota`, `kode_pos`, `aktif`) VALUES
(1, 'reyan', 'e10adc3949ba59abbe56e057f20f883e', 'muhamad reyan', 'kp.sangiang no 7', 'muhamadreyan121188311@gmail.com', '083898576191', 0, '15321', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(6) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(9) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `keterangan_menu` text NOT NULL,
  `harga_menu` double NOT NULL,
  `stok_menu` int(2) NOT NULL,
  `gambar_menu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `kategori`, `nama_menu`, `keterangan_menu`, `harga_menu`, `stok_menu`, `gambar_menu`) VALUES
(1, 'indonesia', 'Cap Cay Goreng', 'Masakan ini banyak mengandung sayuran, dan protein dari daging ayam yang sangat baik untuk menu sarapan di pagi hari. Karena memasaknya sangat mudah dan cepat, jadi anda tidak akan repot di pagi hari.\r\n\r\n\r\n', 23000, 7, 'capcay.jpg'),
(2, 'indonesia', 'Bistik Ayam', 'Menyajikan bistik ayam yang nikmat dan lezat ternyata sangat mudah dan tidak repot lo... Tak hanya bahan-bahannya saja yang mudah didapat tetapi cara membuatnya juga praktis. Anda harus mencoba membuat sajian ini pasti Anda sekeluarga langsung jatuh hati dengan rasanya. \r\n', 30000, 6, 'bistik_ayam.jpg'),
(3, 'chinese', 'Fuyung Hai', ' Bila biasanya kita pergi ke restoran cina, pasti menu fuyunhai selalu ada di salah satu menu utamanya.\r\n', 25000, 7, 'fuyung_hai.jpg'),
(4, 'indonesia', 'Ayam Goreng Mentega', ' ayam mentega yang sudah dipraktekan ini lebih sedap dan bumbu serta rempah-rempahnya cukup beragam menjadikan makanan tradisional indonesia ini cukup dicintai.\r\n', 30000, 6, 'ayam_goreng_mentega.jpg'),
(26, 'indonesia', 'Cumi Goreng Asam Manis', '', 30000, 6, 'cumi_goreng_asam_manis.jpg'),
(19, 'indonesia', 'Angsio Tahu Seafood', 'Buat yang sudah pernah mencoba mencicipi, pasti setuju bila angsoi tahu digolongkan ke dalam aneka hidangan kuliner yang spesial atau bahkan istimewa. Selain rasanya yang enak, menu makan ini juga tergolong sehat karena menggunakan berbagai bahan dengan kandungan nutrisi yang tinggi. Maka tak ayal jika masakan ini diklasifikasikan ke dalam jenis masakan sehat dan halal. Apalagi bila ditambah dengan seafood. ', 30000, 7, 'angsio_tahu_seafood.jpg'),
(6, 'indonesia', 'Kangkung Cah Balacan', '\r\nInfo nutrisi per porsi\r\nEnergi: 66,5 kalori\r\nLemak: 5,3 g\r\nKolesterol: 0 mg\r\nKarbohidrat: 3,3 g\r\n\r\n', 14000, 7, 'kangkung_cah_balacan.jpg'),
(7, '', 'Es Teh Manis', '     apa pun minumannya " minumnya ES TEH MANIS"', 3000, 20, 'es_teh_manis.jpg'),
(9, '', 'Es Jeruk', ' ', 7000, 20, 'es_jeruk.jpg'),
(10, '', 'Teh Botol Sosro', '', 3000, 59, 'teh_botol.jpg'),
(11, '', 'Teh Tawar', '', 1000, 48, 'teh.jpg'),
(12, '', 'Liang Teh Medan', '', 4000, 29, 'liang_teh_medan.jpg'),
(13, '', 'Air Minum Mineral', '', 3000, 60, 'air_minum_mineral.jpg'),
(14, 'indonesia', 'Nasi Goreng', '', 18000, 8, 'nasi_goreng.jpg'),
(15, 'chinese', 'Udang Goreng Tepung', '\r\nNah, Penasaran khan tentang bagaimana rasa udang goreng yang dibantu dengan tepung alias udang goreng tepung. Daripada banyak menghayal.\r\nlangsung aja pesan\r\n', 30000, 6, 'udang_goreng_tepung.jpg'),
(16, 'indonesia', 'Ikan Gurami Asam Manis', '', 50000, 7, 'ikan_gurami_asam_manis.jpg'),
(17, 'chinese', 'Sapo Tahu Seafood', 'apo tahu sendiri Selain rasanya enak juga “aman” untuk tenggorokan karena bukan goreng-gorengan. Ini dia nih resep dengan olahan sayur-sayuran dan sumber protein.\r\n', 30000, 6, 'sapo_tahu_seafood.jpg'),
(18, 'chinese', 'Mun Tahu', 'Mun tahu termasuk masakan cina yang paling mudah dibuat. Bagi penggemar tahu, masakan ini sering kali jadi favorit. Karena itu Anda harus mencobanya segera.\r\n', 25000, 8, 'mun_tahu.jpg'),
(20, 'indonesia', 'Bihun Goreng', '', 18000, 8, 'bihun_goreng.jpg'),
(21, 'chinese', 'Mie Goreng', 'Mie Goreng Enak Spesial telor sederhana\r\n', 18000, 7, 'mie_goreng.jpg'),
(22, 'chinese', 'Sup Jagung', '', 25000, 7, 'sup_jagung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` int(6) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(11) NOT NULL,
  `keterangan_paket` blob NOT NULL,
  `gambar_paket` varchar(255) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paket`
--


-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(2) NOT NULL AUTO_INCREMENT,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `sejarah` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `visi`, `misi`, `sejarah`, `gambar`) VALUES
(1, '<legend>VISI</legend>\r\nUntuk memenuhi  kebutuhan furniture semua kalangan dan memberikan pelayanan yang terbaik dengan mengedepankan kualitas produk furniture dan kepuasan terhadap konsumen dengan harga yang kompetitif.\r\n', '<legend>MISI</legend>\r\n1.Menciptakan produk furniture yang berkualitas tinggi <br>\r\n2.Menciptakan kepuasan terhadap konsumen dengan harga yang kompetitif <br>\r\n3.Dapat memenuhi semua kebutuhan furniture yang diinginkan oleh semua konsumen<br>\r\n4.Memberi pelayanan kepada konsumen dengan mengedepankan kualitas produk furniture<br>', '<legend>SEJARAH</legend>\r\nNama Perusahaan : PT.Decofinco Semesta Mulia <br>\r\nDidirikan : Tahun 2012<br>\r\nPemilik Perusahaan : Bpk Johan Prasetya<br> \r\nManager Perusahan : Ibu Vina Sartika Wijaya<br>\r\nMarketing Perusahaan : Bpk Kharisma <br>\r\nKantor: Ruko Jalur Sutera Timur Kav 6A No 16 Alam Sutera<br>\r\nTempat Produksi :<br>\r\nE-mail : <br>\r\nPhone  : <br>', '17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `isi_pesan` text NOT NULL,
  PRIMARY KEY (`id_testimoni`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `tanggal_masuk`, `isi_pesan`) VALUES
(1, 'budi', '2014-04-18', 'fhfcgcc');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(7) NOT NULL AUTO_INCREMENT,
  `status_transaksi` varchar(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jam_transaksi` time NOT NULL,
  `alamat_kirim` text NOT NULL,
  `id_member` int(5) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `id_session` varchar(30) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `status_transaksi`, `tgl_transaksi`, `jam_transaksi`, `alamat_kirim`, `id_member`, `id_kota`, `id_session`) VALUES
(1, 'Belum Lunas', '2014-07-09', '19:13:21', '', 1, 22, '5jhp0onru5crremmnjdi06lk45'),
(2, 'Belum Lunas', '2014-07-09', '19:47:24', '', 1, 22, '5jhp0onru5crremmnjdi06lk45'),
(3, 'Belum Lunas', '2014-07-09', '23:01:23', '', 1, 22, '5jhp0onru5crremmnjdi06lk45'),
(4, 'Belum Lunas', '2014-07-12', '08:07:40', '', 1, 16, 'vf39bd1ghvnu9s1rmr9m4e3u85'),
(5, 'Belum Lunas', '2014-07-12', '08:20:53', '', 1, 16, 'vf39bd1ghvnu9s1rmr9m4e3u85'),
(6, 'Belum Lunas', '2014-07-12', '12:20:49', '', 1, 16, 'vf39bd1ghvnu9s1rmr9m4e3u85');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id_transaksi` int(7) NOT NULL AUTO_INCREMENT,
  `id_menu` int(6) NOT NULL,
  `jumlah_beli` int(2) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi`, `id_menu`, `jumlah_beli`) VALUES
(1, 2, 1),
(2, 17, 1),
(3, 2, 1),
(4, 17, 1),
(5, 2, 1),
(6, 17, 1),
(7, 11, 1),
(8, 16, 1),
(9, 16, 1),
(10, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE IF NOT EXISTS `transaksi_temp` (
  `id_menu` varchar(6) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `jumlah_beli` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_temp`
--

INSERT INTO `transaksi_temp` (`id_menu`, `id_session`, `jumlah_beli`, `tanggal`, `jam`) VALUES
('11', 'vf39bd1ghvnu9s1rmr9m4e3u85', 1, '2014-07-12', '12:20:29'),
('3', 'vf39bd1ghvnu9s1rmr9m4e3u85', 1, '2014-07-12', '13:26:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
