<html>
<head>
<title>LOGIN</title>
</head>
 
<body>
	<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery162.min.js" type="text/javascript"></script>
	<script src="js/init.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
	<script type="text/javascript" src="js/jquery.flashyNav.1.0.js"></script>	
	<script type="text/javascript">
		$(document).ready(function() {
			
			$('.nav3').flashyNav({
				rolloverColor: '#CCC',	//the default color of the rollover element
				rolloverDuration: 800,	//the default duration for the rollover
				easingMethod: 'easeOutElastic'	//easing method used for animation
			});
			
		});
	</script>
 
<?php
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo '<h3>Username dan Password belum diisi!</h3>';
    } else if ($_GET['error'] == 2) {
        echo '<h3>Username belum diisi!</h3>';
    } else if ($_GET['error'] == 3) {
        echo '<h3>Password belum diisi!</h3>';
    } else if ($_GET['error'] == 4) {
        echo '<h3>Username dan Password tidak terdaftar!</h3>';
    }
}
?>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<center>
				<form name="login" action="connection.php" method="post">
					<table border="0" cellpadding="5" cellspacing="0">
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" /></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="password" name="password" /></td>
						</tr>
						<tr align="right">
							<td colspan="3"><input type="submit" name="login" value="Login" /></td>
						</tr>
					</table>
				</form>
			</center>
		</div>
	</div>
</div>
</body>
</html>