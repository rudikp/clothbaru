<?php 
    require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }

    include "header.php";
?>
<?php
$id_produk=$_GET['id'];
$result = mysql_query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$row = mysql_fetch_array($result);
$fotoFK = $row['id_foto'];
$query = mysql_query("SELECT * FROM foto WHERE id_foto=$fotoFK");
$row2 = mysql_fetch_array($query);


?>
	<div class="container">
		<div class="containerImage">
			<h3><?php echo $row['nama_produk']; ?></h3>
			<div class="row" id="demo-1">

		        <div class="product-gallery col-lg-6 col-md-6">
		        	<img id="product_main_image" src="image/<?php echo $row2['foto1']; ?>" data-zoom-image="image/<?php echo $row2['foto1']; ?>"/>
		        	
		        	<div id="product_gallery">
		        		
		        		<a href="#" data-image="image/<?php echo $row2['foto1']; ?>" data-zoom-image="image/<?php echo $row2['foto1']; ?>">
		        			<img class="product_gallery_thumb" id="img_01" src="image/<?php echo $row2['foto1']; ?>" />
		        		</a>
		        		
		        		<a href="#" data-image="image/<?php echo $row2['foto2']; ?>" data-zoom-image="image/<?php echo $row2['foto2']; ?>">
		        			<img class="product_gallery_thumb" id="img_01" src="image/<?php echo $row2['foto2']; ?>" />
		        		</a>

		        		<a href="#" data-image="image/<?php echo $row2['foto3']; ?>" data-zoom-image="image/<?php echo $row2['foto3']; ?>">
		        			<img class="product_gallery_thumb" id="img_01" src="image/<?php echo $row2['foto3']; ?>" />
		        		</a>
		        	</div>
		        </div>

				<div class="col-lg-6 col-md-6">
		            <table>
		            	<!-- <tr>
		            		<td><h4><b>Product Name</b></h4></td>
		            		<td><h4>:</h4></td>
		            		<td><h4><?php echo $row['nama_produk']; ?></h4></td>
		            	</tr> -->
		            	<tr>
		            		<td><h4><b>Harga </b></h4></td>
		            		<td><h4> : </h4></td>
		            		<td><h4><?php echo $row['harga']; ?></h4></td>
		            	</tr>
		            	<tr>
		            		<td><h4><b>Deskripsi </b></h4></td>
		            		<td><h4> : </h4></td>
		            		<td><h4><?php echo $row['harga']; ?></h4></td>
		            	</tr>
		            </table>
		        </div>

		    </div>
		</div>
	</div>
	
	<?php include 'footer.php'; ?>