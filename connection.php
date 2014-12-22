<?php

	require_once("koneksi.php");

	$tbl_name ="user";

	// username and password sent from form 
	$myusername=$_POST['username']; 
	$mypassword=$_POST['password']; 

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql) or die(mysql_error());

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	session_start();
		$_SESSION['myusername'] = $_POST['username'];
		$_SESSION['mypassword'] = $_POST['password'];
		header("location:custom.php");
	}
else {
		echo "<script type='text/javascript'>alert('Username atau Password yang anda masukan salah');</script>";
		header("location:login.php");
}
		
?>