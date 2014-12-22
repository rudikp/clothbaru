<?php
//panggil file config.php untuk menghubung ke server
include('koneksi.php');
 
//tangkap data dari form
$idb = $_POST['id_barang'];
$idt = $_POST['id_tipebaju'];
$idj = $_POST['id_jeniskelamin'];
$idu = $_POST['id_ukuranbaju'];
$idw = $_POST['id_warnakulit'];
$idperut = $_POST['id_besarperut'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$foto = $_POST['foto'];
if (!empty($_FILES["nama_file"]["tmp_name"])) 
	{ 
		$jenis_gambar=$_FILES['nama_file']['type'];       
		if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")   
		 {                     
		 	$gambar = $namafolder . basename($_FILES['nama_file']['name']);                
		 	if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {             
		 		echo "Gambar berhasil dikirim ".$gambar;            
		 		$sql="insert into table (judul_gambar,nama_file) values ('$judul_gambar','$gambar')";            
		 		$res=mysql_query($sql) or die (mysql_error());         
		 	} else {            
		 		echo "Gambar gagal dikirim";        
		 	}    
		 } else {        
		  echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";   
		 	} 
		} else {     
			echo "Anda belum memilih gambar"; 
		}   
$query = mysql_query("insert into produk values('', '$idb', '$idt', '$idj', '$idu', '$idw', '$idperut','$nama_produk','$harga','$foto')") or die(mysql_error());
 
if ($query) {
    header('location:input.php?message=success');
}
?>