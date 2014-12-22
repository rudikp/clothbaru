<?php 
    require_once("koneksi.php");
    session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Cloth</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<nav class="navbar navbar-primary navbar-fixed-top" role="navigation">
	  	<div class="container">
			<div class="navbar-header">
			  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			  	</button>
			  	<a class="navbar-brand" href="index.php">CLOTH</a>
			</div>
			<div class="navbar-collapse collapse">
			  	<ul class="nav navbar-nav">
					<li class="active"><a href="custom.php">Custom Dress</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="man.php">Man</a></li>
								<ul><a href="formal.php">Formal</a></ul>
								<ul><a href="casual.php">Casual</a></ul>
							<li><a href="woman.php">Woman</a></li>
								<ul><a href="formalwoman.php">Formal</a></ul>
								<ul><a href="casualwoman.php">Casual</a></ul>
							<li><a href="aksesoris.php">Acessories</a></li>
							</ul>
					</li>
					<?php if(isset($_SESSION['myusername']))
					{
					?>
						<li>
							<a href =""><?php echo $_SESSION['myusername']?>   |</a>
						</li>
						<li>
							<a href="logout.php">Logout</a>
						</li>
					<?php
					}
					?>
				</ul>
			</div><!--/.navbar-collapse -->
	  	</div>
	</nav>
