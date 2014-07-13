<?php 
//ob_start();
session_start();
include "../konek.php";
// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM admin WHERE username='$myusername' AND password='$mypassword'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
echo $sql;

// Mysql_num_row is counting table row
$count=mysql_num_rows($query);

// If query matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "index.php"
//session_register("myusername");
//session_register("mypassword");
			$_SESSION['id_admin'] = $data['id_admin'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['password'] = $data['password'];

//if(isset($_SESSION['User_id'])) {
echo"<script>alert('Anda telah login !'); window.location = 'index.php'</script>";
//header("location:index.php");
//}

}
else {
echo "<script>alert('Wrong Username or Password!'); window.location = 'login.php'</script>";
} 
ob_end_flush();
?>