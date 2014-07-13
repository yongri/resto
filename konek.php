<?php
date_default_timezone_set("asia/jakarta");
$hostname = "localhost"; /*nama server*/
$dbuser = "root"; /*nama username database*/
$dbpass = ""; /*password database*/
$dbname = "db_mataharijaya"; /*nama database*/

$koneksi = mysql_connect($hostname,$dbuser,$dbpass)or die ('Tidak bisa konek DB');
$koneksi = mysql_select_db($dbname,$koneksi) or die ('DB tidak ada');
?>