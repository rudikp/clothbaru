<?php 
include 'koneksi.php';
//$t = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM rating"),0);
			
		for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){
			$query[$i][$j] = "select * from rating where id_user='$i' AND id_produk='$j'";
			

			$rs[$i][$j] = mysql_query($query[$i][$j]);
			$se[$i][$j] = mysql_fetch_array($rs[$i][$j]);
			echo $se[$i][$j]['rating'];
			//$rsB = mysql_query($queryB);
			//$seB = mysql_fetch_array($rsB);
			
			//echo $se['rating'];
		
		//$usr[1][1]=$se['rating'];
		//echo $usr[1][$j];
	}
}


	for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){
		$cari[$i][$j]=0;
	}
	$rata[$i]=0;
}
?>
<html>
<head>
</head>
<body>
	<?php

	?>
<!--PENGHITUNGAN RATA-RATA-->


	<table border=1>
		<tr>
	<!--PENGHITUNGAN ISI TABEL USER DAN ITEM-->
	<?php 
	for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){

	?>
	
	<td><?=$se[$i][$j]['rating'];?></td>

	<?php 
		}
		echo "</tr>";
	}

	?>
	</table>

	<!--PENCARIAN rating 0 PADA TABEL-->
	<?php 
	for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){
			if ($se[$i][$j]['rating']==0)
			$cari[$i][$j]=1;
		}
	}
	

	for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){
		if($cari[$i][$j]!=0)
			echo $i.$j.$cari[$i][$j];
		}
	}
	
	
	
	/***************************************BARU**********************************/
	//Rata-rata user 1 ( user yang ingin diberi rekomendasi )
	for ($j=1;$j<9;$j++){
		$rata[1] += $se[1][$j]['rating'];
	}
	$rata[1]=$rata[1]/($j-1);
	
	
	//Rata-rata user 2-8
	for ($i=2;$i<9;$i++){
		for ($j=1;$j<109;$j++){
			$rata[$i]+=$se[$i][$j]['rating'];
		}
		$rata[$i]=$rata[$i]/($j-1);
	}

	//menampilkan rata-rata tiap user
	for($i=1;$i<9;$i++){
		echo "<br> User ".$i." = ".$rata[$i];
	}
	
	//konversi tabel setelah dilakukan perhitungan Rating Ui - Rata2 Rating Ui
	//USER 1 (user yang ingin diberi rekomendasi)
	for($i=1;$i<9;$i++){
		$se[1][$i]['rating']-=$rata[1];
	}
	
	//USER 2-9
	for ($i=2;$i<9;$i++){
		for ($j=1;$j<109;$j++){
			$se[$i][$j]['rating']=$se[$i][$j]['rating']-$rata[$i];
		}
	}
	
	//inisialisasi perhitungan A
	for ($i=1;$i<9;$i++){
		$jumA[$i]=0;
	}
	
	//perhitungan A : Sigma jumlah hasil konversi U1 dengan Ui
	for ($i=1;$i<8;$i++){
		for ($j=1;$j<109;$j++){
			//echo "<br>".$jumA[$i]." + (".$user[1][$j]." * ".$user[$i+1][$j].")";
			$jumA[$i]+=($se[1][$j]['rating']*$se[$i+1][$j]['rating']);
		}
	}
	
	//inisialisasi perhitungan B
	for ($i=1;$i<9;$i++){
		$akarB[$i]=0;
	}
	//perhitungan B : Akar sigma U1 - U5
	for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){
			$akarB[$i]+=pow($se[$i][$j]['rating'],2);
		}
		$akarB[$i] = sqrt($akarB[$i]);
	}
	
	//perhitungan C : B U1 dikali B Ui
	for ($i=1;$i<8;$i++){
		$jumC[$i]=$akarB[1]*$akarB[$i+1];
	}
	
	//Perhitungan A/C
	for ($i=1;$i<8;$i++){
		$sim[$i]=$jumA[$i]/$jumC[$i];
	}
	
	//Pemilihan similarity yg mendekati +1, dan menghitung prediksi
		$jumTerdekat = 0;
	
	//inisialisasi prediction A
		$sigmaA = 0;
		
	//inisialisasi sigma $sim terdekat
		$sigmaB=0;
	//perhitungan prediction A : sim[i] * user[i][7]
	for ($i=1;$i<8;$i++){
		if($sim[$i]>0){
		$sigmaA+=($sim[$i]*$se[$i][108]['rating']);	
		$sigmaB+=$sim[$i];		
		$jumTerdekat++;
		}
	}
	
	//Perhitungan Prediction = rata[1] + ($sigmaA/$sigmaB)
	$pred = $rata[1] + ($sigmaA/$sigmaB);
	
	
	
	//perhitungan prediction B : sigma $sim terdekat +1
	
	for ($i=1;$i<$jumTerdekat+1;$i++){
		
	}
	

?>
<br><br>
<table border=1>
		<tr>
		Tabel konversi
		</tr>
		<tr>
	<!--Tampilan tabel yg dikonversi-->
	<?php 
	for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){

	?>
	
	<td><?=$se[$i][$j]['rating'];?></td>

	<?php 
		}
		echo "</tr>";
	}

	?>
	</table>
	
	<br><br>
	JumA
	<?php
	//menampilkan jumA
	for($i=1;$i<8;$i++){
		echo "<br> User1 dengan User ".($i+1)." = ".$jumA[$i];
	}
	?>
	
	<br><br>
	JumB
	<?php
	//menampilkan akarB
	for($i=1;$i<8;$i++){
		echo "<br> User ".($i)." = ".$akarB[$i];
	}
	?>
	<br><br>
	JumC
	<?php
	//menampilkan jumC = jumA/akarB
	for($i=1;$i<8;$i++){
		echo "<br> User ".($i)." = ".$jumC[$i];
	}
	?>
	
	<br><br>
	Similarity
	<?php
	//menampilkan sim
	for($i=1;$i<8;$i++){
		echo "<br> User ".($i)." = ".$sim[$i];
	}
	?>
	
	<br><br>
	Barang yang belum dirating user :
	<?php
		//untuk menyimpan item
	//$items = 0;
	//cari item yang ranting masih 0
		for ($i=1;$i<9;$i++){
		for ($j=1;$j<109;$j++){
			if ($se[$i][$j]['rating']==0)
			{
			$items = $j;
			break;
			}
		}
	}
//		echo $items;	
		$query = "select * from produk where id_produk = '$items'";
		$sql = mysql_query($query);
		$dataItem = mysql_fetch_array($sql);

//		echo $dataItem['foto'];
		echo "<img src='image/".$dataItem['foto']."'>";	 
	?><br><br>
	Prediksi User = 
	<?php
	//menampilkan prediksi
		echo $pred;
	?>
</body>
</html>