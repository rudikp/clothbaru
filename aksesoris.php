<?php include 'koneksi.php'; ?>
<?php include 'header.php'; ?>
<link href="style.css" type="text/css" rel="stylesheet" />
<!-- Bootstrap -->
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
<div class="jumbotron">
	<div class="container">
		<div class="row">
  			<?php

				$con=mysqli_connect("localhost","root","","cloth");
				// Check connection
				if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

					//queryproduk
					$produk = mysql_query("SELECT * FROM produk WHERE id_barang = 3 ORDER BY id_produk") or die(mysql_error());

					//pageproduk
					if(!empty($_GET))
						{
							$page=$_GET['page'];
						}

					if(!isset($_GET['page']))
						{
							$page=1;
						}

						$total=mysql_num_rows($produk);
						$num_rec_per_page=8;
						$mulai=($page-1)*$num_rec_per_page;
						$num_of_page=ceil($total/$num_rec_per_page);
						$sql="SELECT * FROM produk WHERE id_barang = 3 ORDER BY id_produk 
							  limit $mulai,$num_rec_per_page";
						$hasil=mysqli_query($con, $sql);

				//$result = mysqli_query($con,"SELECT * FROM produk WHERE id_barang='3'");
				while($row = mysqli_fetch_array($hasil)) { ?>
					  <div class="col-sm-6 col-md-4 col-lg-3">
					    <div class="thumbnail">
					      <img src="image/<?php echo $row['foto']; ?>" width="150" alt="...">
					      <div class="caption">
					        <!--<p><?php echo $row['nama_produk'];?></p>-->
					        <p><a href="produkdetail.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-primary" role="button">Details</a></p>
					      </div>
					    </div>
					  </div>


				<?php
				}

			?>
		</div>
	</div>				
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</div>
<?php
			echo "<br>";
			echo "<center>";
			if ($total <= 8)
			{

			}
			else
			{
				for($hal=1; $hal<=$num_of_page;$hal++)
				{
					echo "<a href=aksesoris.php?page=$hal>" . $hal . "</a> ";
				}						
			}

			echo "</center>";
			?>


<?php include 'footer.php'; ?>