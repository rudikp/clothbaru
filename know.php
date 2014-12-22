<?php
	include "koneksi.php";
	//data array
	$data[1] = "1"; //pria
	$data[2] = "2"; //medium
	$data[3] = "2"; //hitam
	$data[4] = "1"; //formal
	$data[5] = "300000";
	//get data dari array
	$sql = mysql_query("select * from produk where id_jeniskelamin = '$data[1]' AND id_ukuranbaju = '$data[2]' 
		AND id_warnakulit = '$data[3]' AND id_tipebaju = '$data[4]' AND harga <= $data[5]");
	//$query = mysql_query($sql);
	$cek = mysql_num_rows($sql);

	echo $cek;
	echo "TEST<br>";

	while ($arrayQuery = mysql_fetch_array($sql))
	{
		echo $arrayQuery['id_produk'];
		echo $arrayQuery['harga'];
		echo $arrayQuery['id_ukuranbaju'];
		echo "<br>";	
	}

	/*
	Atribut barang 1-5
	
	Struktur:
		$item[alamat][0] = id barang
		$item[alamat][1] = attribut 1 --> misalkan harga -->LIB
		$item[alamat][2] = attribut 2 --> misalkan pixel -->MIB
	
	Importance weight : bisa di tentukan dari awal atau 
						ditentukan tergantung dari barang yg user lihat / input langsung dari user (menggunakan MAUT).
						
	Disini digunakan importance weight : 	w1 = 0.7 (harga)
											w2 = 0.3 (pixel)
											
	Range harga = 0-1000
	Range Pixel = 3-12
	*/
	
	//att barang 1-5
	$item[1][0] = 8;	$item[1][1] = 148;	$item[1][2] = 8; //item 1
	$item[2][0] = 19;	$item[2][1] = 182;	$item[2][2] = 8; //item 2
	$item[3][0] = 21;	$item[3][1] = 196;	$item[3][2] = 8; //item 3
	$item[4][0] = 23;	$item[4][1] = 208;	$item[4][2] = 10;
	$item[5][0] = 54;	$item[5][1] = 259;	$item[5][2] = 9;
	
	//importance weight
	$w1 = 0.7;
	$w2 = 0.3;
	
	//att [atribut ke-n][0] = nilai minimal dari atribut ke-n
	//att [atribut ke-n][1] = nilai maksimal dari atribut ke-n
	
	//harga
	$att[1][0]= 0;
	$att[1][1]= 1000;
	
	//pixel
	$att[2][0]= 3;
	$att[2][1]= 12;
	
	
	//hitung similarity sim(p,r)
	for($i=1;$i<=5;$i++){
		//for($j=1;$j<=2;$j++){
			$sim[$i][1] = ($att[1][1]-$item[$i][1])/($att[1][1]-$att[1][0]); //harga
			$sim[$i][2] = ($item[$i][2]-$att[2][0])/($att[2][1]-$att[2][0]); //pixel
			
			echo $sim[$i][1]."<br>";
			echo $sim[$i][2]."<br><br>";
			
		//}
	}
	
	echo "<br>";
	
	//hitung similarity sim(p,REQ)
	for($i=1;$i<=5;$i++){
			$simP[$i] = ( ($w1*$sim[$i][1])+($w2*$sim[$i][2]) )/($w1+$w2); //harga
			
			echo $simP[$i]."<br>";
	}
	
	//cari nilai simP tertinggi
			$besar = -1;
			for ($i=1;$i<=5;$i++){
					if ($simP[$i]>$besar){
						$besar=$simP[$i];
						$dokumen=$i;
					}
			}
	
	echo "<br>";
	
	echo "Jadi data item yang akan di rekomendasikan <br>ID : ".$item[$dokumen][0].
			"<br>Harga : ".$item[$dokumen][1].
			"<br>Ukuran : ".$item[$dokumen][2].
			"<br>Nilai simP : ".$besar;
?>