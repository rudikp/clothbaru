<?php
include 'koneksi.php';
include 'header.php';
?>
<div class="jumbotron">
	<div class="container">
		<?
		if ($_POST) {
			
			// foreach ($_POST['jawaban'] as $key => $value) {
			// 	echo 'Jawaban ['. $key .'] : ' . $value . '<br>';
			// }

			$jawaban1 = $_POST['jawaban'][1];
			$jawaban2 = $_POST['jawaban'][2];
			$jawaban3 = $_POST['jawaban'][3];
			$jawaban4 = $_POST['jawaban'][4];
			$jawaban5 = $_POST['jawaban'][5];
			$jawaban6 = $_POST['jawaban'][6];
			$harga = str_replace('.', '', $jawaban6);
			//echo $harga;
			// echo $jawaban1;
			// echo $jawaban2;
			// echo $jawaban3;
			// echo $jawaban4;
			// echo $jawaban5;
			// echo "<br>";
			$queryJawaban1 = mysql_query("select id_jeniskelamin from jenis_kelamin where nm_jk= '$jawaban1'");
			$queryJawaban2 = mysql_query("select id_ukuran from ukuran_baju where ukuran= '$jawaban2'");
			$queryJawaban3 = mysql_query("select id_warnakulit from warna_kulit where nm_warnakulit= '$jawaban3'");
			$queryJawaban4 = mysql_query("select id_barang from barang where nama_barang= '$jawaban4'");
			$queryJawaban5 = mysql_query("select id_tipebaju from tipe_baju where nm_tipebaju= '$jawaban5'");
			$cek = mysql_fetch_array($queryJawaban1);
			$cek1 = mysql_fetch_array($queryJawaban2);
			$cek2 = mysql_fetch_array($queryJawaban3);
			$cek3 = mysql_fetch_array($queryJawaban4);
			$cek4 = mysql_fetch_array($queryJawaban5);
			// echo $cek['id_jeniskelamin'];
			// echo "<br>";
			// echo $cek1['id_ukuran'];
			// echo "<br>";
			// echo $cek2['id_warnakulit'];
			// echo "<br>";
			// echo $cek3['id_barang'];
			// echo "<br>";
			// echo $cek4['id_tipebaju'];
			// echo "<br>";
			



			$sql = mysql_query("select * from produk where id_jeniskelamin = '$cek[id_jeniskelamin]' AND id_ukuranbaju = '$cek1[id_ukuran]' 
		AND id_warnakulit = '$cek2[id_warnakulit]' AND id_barang = '$cek3[id_barang]'  AND id_tipebaju = '$cek4[id_tipebaju]' AND harga <= $harga");
		$cek5 = mysql_num_rows($sql);
		// echo "testingcek";
		// echo $cek5;
		// echo "<br>";
		if($cek5 > 0)
		{

			// echo "TEST<br>";
			///mengubah fetch array menjadi array yg memiliki index
			$arraydata = array();
			$i=0;
			while ($arrayQuery = mysql_fetch_array($sql))
			{
				$arraydata[$i+1] = $arrayQuery['id_produk'];
				$i++;
				$arraydata[$i+1] = $arrayQuery['harga'];
				$i++;
				$arraydata[$i+1] = $arrayQuery['id_ukuranbaju'];
				$i++;
				// $key = $arrayQuery['id_produk'];
				// $arraydata[$key] = $arrayQuery['harga'];
				// $arraydata[$key] = $arrayQuery['id_ukuranbaju'];
				// echo $arrayQuery['id_produk'];
				// echo $arrayQuery['harga'];
				// echo $arrayQuery['id_ukuranbaju'];
				// echo "<br>";	
			}
			//echo $arraydata[13];

			///Mengubah ukuran baju menjadi memiliki nilai
			for ($i=1;$i<=$cek5;$i++)
			{
				if ($i%3 == 0)
				{
					$dataUkuran = $arraydata[$i];
					if($dataUkuran  == 1)
					{
						$arraydata[$i] = 38;
					}
					elseif ($dataUkuran  == 2) {
						$arraydata[$i] = 41;
					}
					elseif ($dataUkuran  == 3) {
						$arraydata[$i] = 50;
					}
					elseif ($dataUkuran  == 4) {
						$arraydata[$i] = 53;
					}
					elseif ($dataUkuran  == 5) {
						$arraydata[$i] = 56;
					}
				}
			}

			//echo $arraydata[6];
			/*
			Atribut barang 1-5
			
			Struktur:
				$item[alamat][0] = id barang
				$item[alamat][1] = attribut 1 --> misalkan harga -->LIB
				$item[alamat][2] = attribut 2 --> misalkan ukuran -->MIB
			
			Importance weight : bisa di tentukan dari awal atau 
								ditentukan tergantung dari barang yg user lihat / input langsung dari user (menggunakan MAUT).
								
			Disini digunakan importance weight : 	w1 = 0.7 (harga) 
													w2 = 0.3 (ukuran)
													
			Range harga = 65000-500000
			Range ukuran = 38-56
			*/
			
			//att barang 1-5
			// echo "<br>";
			// $item[1][0] = 8;	$item[1][1] = 148;	$item[1][2] = 8; //item 1
			// $item[2][0] = 19;	$item[2][1] = 182;	$item[2][2] = 8; //item 2
			// $item[3][0] = 21;	$item[3][1] = 196;	$item[3][2] = 8; //item 3
			// $item[4][0] = 23;	$item[4][1] = 208;	$item[4][2] = 10;
			// $item[5][0] = 54;	$item[5][1] = 259;	$item[5][2] = 9;

			///Mengubah array data produk menjadi array 2 dimensi
			// $items = array();
			// $k = 1;
			// for ($i=1;$i<=($cek5/3);$i++)
			// {
			// 	for($j=0;$j<3;$j++)
			// 	{
			// 		$items[$i][$j] = $arraydata[$k];
			// 		$k++;		
			// 	}
			// 	//$k += 3;
			// }
			
			// echo $cek5;
			// echo"<br>";
			//baruu
			$items = array();
			$k = 1;
			for ($i=1;$i<=$cek5;$i++)
			{
				for($j=0;$j<3;$j++)
				{
					$items[$i][$j] = $arraydata[$k];
					if($k%3 != 0)
					{
						$k++;
					}		
				}
				$k ++;
				//echo $k;
			}
			//echo $items[1][0];
			// echo "<br>";
			//importance weight
			$w1 = 0.7;
			$w2 = 0.3;
			
			//att [atribut ke-n][0] = nilai minimal dari atribut ke-n
			//att [atribut ke-n][1] = nilai maksimal dari atribut ke-n
			
			//harga
			$att[1][0]= 65000;
			$att[1][1]= 500000;
			
			//ukuran
			$att[2][0]= 38;
			$att[2][1]= 56;
			
			
			//hitung similarity sim(p,r)
			for($i=1;$i<=$cek5;$i++){
				//for($j=1;$j<=2;$j++){
					$sim[$i][1] = ($att[1][1]-$items[$i][1])/($att[1][1]-$att[1][0]); //harga
					$sim[$i][2] = ($items[$i][2]-$att[2][0])/($att[2][1]-$att[2][0]); //ukuran
					
					// echo $sim[$i][1]."<br>";
					// echo $sim[$i][2]."<br><br>";
					
				//}
			}
			
			// echo "<br>";
			
			//hitung similarity sim(p,REQ)
			for($i=1;$i<=($cek5);$i++){
					$simP[$i] = ( ($w1*$sim[$i][1])+($w2*$sim[$i][2]) )/($w1+$w2); //harga
					
				//	echo $simP[$i]."<br>";
			}
			
			//cari nilai simP tertinggi
					$besar = -1;
					for ($i=1;$i<=($cek5);$i++){
							if ($simP[$i]>$besar){
								$besar=$simP[$i];
								$dokumen=$i;
							}
					}
			
			// echo "<br>";
			
			// echo "Jadi data item yang akan di rekomendasikan <br>ID : ".$items[$dokumen][0].
			// 		"<br>Harga : ".$items[$dokumen][1].
			// 		"<br>Ukuran : ".$items[$dokumen][2].
			// 		"<br>Nilai simP : ".$besar;
			$id_produkbaru = $items[$dokumen][0];

			$sqlTampil = mysql_query("Select * from produk where id_produk = '$id_produkbaru'");
			$sqlArrayProdukBaru = mysql_fetch_array($sqlTampil);
			echo "<br>";
			echo $sqlArrayProdukBaru['nama_produk'];
			echo "<br>";
			echo '<a href="produkdetail.php"><img src="image/'.$sqlArrayProdukBaru['foto'].'"></a>';

			$sql2 = mysql_query("select * from produk where id_jeniskelamin = '$cek[id_jeniskelamin]' AND id_ukuranbaju = '$cek1[id_ukuran]' 
			AND id_warnakulit = '$cek2[id_warnakulit]' AND id_barang = '$cek3[id_barang]'  AND id_tipebaju = '$cek4[id_tipebaju]' AND harga <= $harga");
			
			echo "<br>";	
			// while($rowAkhir = mysql_fetch_array($sql2))
			// {
			// 	$rowAkhir['id_produk'];
			// 	echo '<img src="image/'.$rowAkhir['foto'].'">';
				
			// }

			//Semua dimulai dari sini dice
			$items = array();
			$items[1][0] = $id_produkbaru;
			$items[1][1] = $sqlArrayProdukBaru['nama_produk'];

			$query = mysql_query("select * from produk where id_produk != $id_produkbaru AND id_jeniskelamin = '$cek[id_jeniskelamin]'");
			$cek = mysql_num_rows($query);
			//echo $cek;

			$arraydata = array();
			$i=2;
			while ($arrayQuery = mysql_fetch_array($query))
			{
				$arraydata[$i+1] = $arrayQuery['id_produk'];
				//echo $arraydata[$i+1] ;
				//echo "<br>";
				$i++;
				$arraydata[$i+1] = $arrayQuery['nama_produk'];
				//echo $arraydata[$i+1] ;
				//echo "<br>";
				$i++;
			}

			///Mengubah array data produk menjadi array 2 dimensi
			$k = 3;
			for ($i=2;$i<=($cek+1);$i++)
			{
				for($j=0;$j<2;$j++)
				{
					$items[$i][$j] = $arraydata[$k];
					$k++;		
				}
			}
			// echo "ini";
			// echo $items[107][1];
			//echo "<br>";
			function dice($str1='', $str2='')
			{
				
			    $str1_length = strlen($str1);
			    $str2_length = strlen($str2);	
				
				//N-gram
				$gram = 2;
				
			    // Length of the string must not be equal to zero
			    if ( ($str1_length==0) OR ($str2_length==0) )
			        return 0;

			    $ar1 = array();
			    $ar2 = array();
			    $intersection = 0;

			    // find the pair of characters
			    for ($i=0 ; $i<($str1_length-1) ; $i++)
			        $ar1[] = substr($str1, $i, $gram);

			    for ($i=0 ; $i<($str2_length-1) ; $i++)
			        $ar2[] = substr($str2, $i, $gram);

			    // find the intersection between the two sets
			    foreach ($ar1 as $pair1) {
			        foreach ($ar2 as $pair2) {
			            if ($pair1 == $pair2)
			                $intersection++;
			        }
			    }

			    $count_set = count($ar1) + count($ar2);
			    $dice = (2 * $intersection) / $count_set;
			    return $dice;
			}	

			//Data item --> $item[n][1] = ID item
			//				$item[n][2] = Keyword item
							
			
			
			//perhitungan Similarity antara item 1 dengan 2-108
			for($i=1;$i<=$cek;$i++){
				$sim[$i] = dice($items[1][1],$items[$i+1][1]);
				echo "Similarity Item1 dengan Item".($i+1)." = ".$sim[$i]."</br>";
			}
			
			//cari nilai sim tertinggi
				$besar = -1;
				for ($i=1;$i<=$cek;$i++){
						if ($sim[$i]>$besar){
							$besar=$sim[$i];
							$dokumen=$i+1;
						}
				}
					
			echo "Jadi yang memiliki kemiripan paling tinggi terhadap Item1 = Item ".$dokumen." dengan nilai kemiripan = ".$besar;
			$dataGambar = $arraydata[$dokumen];
			// echo "<br>";
			// echo $arraydata[$dokumen];


			$sqlDice = mysql_query("select * from produk where id_produk=$dataGambar") or die();
			$arrayDice = mysql_fetch_array($sqlDice);
			$countDice = mysql_num_rows($sqlDice);
			if($countDice > 0)
			{
				echo "<br>";
				echo '<img src="image/'.$arrayDice['foto'].'">';
			}
			else
			{

			}


		}
		else
		{
			echo "Data Tidak Ditemukan";
		}
	}
		?>
	</div>
</div>

<?php include 'footer.php'; ?>