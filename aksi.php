<?php
	
error_reporting(0);
session_start();
include "konek.php"; 
$module=$_GET[module];
$act=$_GET[act];

if ($module=='keranjang' AND $act=='tambah')
{
	$sid = session_id();
	$sql = mysql_query("SELECT stok_menu FROM menu WHERE id_menu='".$_GET['id']."'");
	$r=mysql_fetch_array($sql);
	$stok_menu=$r['stok_menu'];
  
	if ($stok_menu == 0){
      echo "<script>window.alert('stok_menu Habis!')
	  window.location=('index.php')</script>";
	}
	else{
	// check if the product is already
	// in cart table for this session
	$sql2 = mysql_query("SELECT id_menu FROM transaksi_temp
			WHERE id_menu='".$_GET['id']."' AND id_session='".$sid."'");
	$ketemu=mysql_num_rows($sql2);
	if ($ketemu==0){
		// put the product in cart table
		$sql3="INSERT INTO transaksi_temp (id_menu, id_session, jumlah_beli, tanggal, jam)
				VALUES ('".$_GET['id']."', '".$sid."',1, CURDATE(),CURTIME())";
		$query3=mysql_query($sql3);		
		
		$sql4="SELECT stok_menu FROM menu WHERE id_menu='".$_GET['id']."'";
		$query4=mysql_query($sql4);
		$jml_menu=mysql_num_rows($query4);

		if($query4)
			{
				$sql5="UPDATE menu SET stok_menu=stok_menu-{$jml_menu} WHERE id_menu='".$_GET['id']."'";
				$query5=mysql_query($sql5);
			}
		else 
			{
			// update product quantity in cart table
			mysql_query("UPDATE transaksi_temp 
					SET jumlah_beli = jumlah_beli + 1
					WHERE id_session ='".$sid."'");	
			}				
		}
	deleteAbandonedCart();
	header('Location:keranjang_belanja.php');
  }				
}
elseif ($module=='keranjang' AND $act=='hapus')
{
	$sql6  = "SELECT * FROM transaksi_temp WHERE id_session = '" . $sid . "' AND id_menu='".$_GET['id']."'";
	$query6 = mysql_query($sql6);
	//$jumlah_barang = mysql_num_rows($result);
	
	$sql7 = "DELETE FROM transaksi_temp WHERE id_menu='".$_GET['id']."'";
	$query7 = mysql_query($sql7);
	if($query7)
	{
		$sql8= "UPDATE menu SET stok_menu = stok_menu+1 WHERE id_menu='".$_GET['id']."' AND id_session ='".$sid."'";
		$query8 = mysql_query($sql8);
		if($query8)
		{
			$sql9= "UPDATE menu SET stok_menu = stok_menu+1 WHERE id_menu='".$_GET['id']."' AND id_session ='".$sid."'";
		$query9 = mysql_query($sql9);
		}
		
	}
	
	header('Location:keranjang_belanja.php');				
}
elseif ($module=='keranjang' AND $act=='update')
{
	$error = false; // set error variable
	foreach ($_POST['id'] as $key=>$id) // loop array keranjang belanja
	{
		// Cek stok_menu 
		$sql = "SELECT stok_menu 
			FROM menu 
			WHERE id_menu='".$id."'";
		$Q 			= mysql_query($sql);
		$data 		= mysql_fetch_array($Q);
		$jml_baru 	= $_POST['jml'][$key];
		$jml_lama 	= $_POST['jmllama'][$key];
		$nama_menu 	= $_POST['nama_menu'][$key];
		//echo 'Jumlah baru '.$jml_baru.', jumlah lama '.$jml_lama.'</br>';
		if ( $jml_baru > $jml_lama ) // Jika jumlah_beli baru lebih besar dari jumlah_beli lama
		{
			$selisih = $jml_baru - $jml_lama;
			if ($data['stok_menu'] >= $selisih) // stok_menu masih mencukupi
			{				
				$sql = "UPDATE transaksi_temp 
					SET jumlah_beli = '{$jml_baru}' 
					WHERE id_menu='".$id."'";
				mysql_query($sql) or mysql_error();	
				$sql = "UPDATE menu 
					SET stok_menu = stok_menu-{$selisih} 
					WHERE id_menu='".$id."'";
				mysql_query($sql) or mysql_error();
			}
			else
			{ 	
				$error = true;
				if (!isset($_SESSION['error_stok'])) 
					$_SESSION['error_stok'] = array();
				$_SESSION['error_stok'][] = 'Menu '.$nama_menu.' habis stok.';
			}	
		}
		else
		{
			if ($jml_baru > 0) // jika jumlah baru tidak sama dengan 0
			{
				$selisih 	= $jml_lama - $jml_baru;
				$sql 		= "UPDATE transaksi_temp 
					SET jumlah_beli = '{$jml_baru}'
					WHERE id_menu='".$id."'";
				$Q 			= mysql_query($sql) or mysql_error();
				
				$sql		= "UPDATE menu 
					SET stok_menu = stok_menu+{$selisih} 
					WHERE id_menu = '".$id."'";
				$Q = mysql_query($sql) or mysql_error();
			}
			else // jika jumlah baru sama dengan 0
			{
				$sql 		= "DELETE FROM transaksi_temp
					WHERE id_menu='".$id."'";
				$Q 			= mysql_query($sql) or mysql_error();
			}
		}
	}
	if (!$error) 
		header('Location:keranjang_belanja.php?success=true'); 
	else	
		header('Location:keranjang_belanja.php?success=false'); 
}
else 
{
  $id       = $_POST[id];
  $jml_data = count($id);
  $jumlah   = $_POST[jml]; // quantity
  for ($i=1; $i <= $jml_data; $i++){
	//$sql2 = mysql_query("SELECT stok_menu FROM menu	WHERE id_menu='".$id[$i]."'");
	$sql2 = mysql_query("SELECT stok_menu FROM transaksi_temp a, menu b WHERE a.id_menu = b.id_menu AND id_session = '".$id[$i]."'");

	while($r=mysql_fetch_array($sql2)){
    if ($jumlah[$i] > $r[stok_menu]){
        echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada');</script>";
        header('Location:keranjang_belanja.php');
    }
    elseif($jumlah[$i] == 0){
        echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');</script>";
        header('Location:keranjang_belanja.php');
    }
    else{
      mysql_query("UPDATE transaksi_temp SET jumlah_beli = '".$jumlah[$i]."'
                                      WHERE id_session = '".$id[$i]."'");
      header('Location:keranjang_belanja.php');
    }
  }
  }
}






/*
	Delete all cart entries older than one day
*/
function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM transaksi_temp 
	        WHERE tgl_order_temp < '$kemarin'");
}
?>
