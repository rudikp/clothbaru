<?php
include 'koneksi.php';
$query = mysql_query("select * from produk where harga <= 300000 AND id_ukuranbaju = 2");
$cek = mysql_num_rows($query);

echo $cek;
?>