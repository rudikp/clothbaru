<?php 
	$user[1][1]=8;
	$user[1][2]=5;
	$user[1][3]=7;
	$user[1][4]=10;
	$user[1][5]=4;
	$user[1][6]=1;
	$user[1][7]=0;
	
	$user[2][1]=9;
	$user[2][2]=3;
	$user[2][3]=4;
	$user[2][4]=7;
	$user[2][5]=2;
	$user[2][6]=2;
	$user[2][7]=5;
	
	$user[3][1]=6;
	$user[3][2]=7;
	$user[3][3]=8;
	$user[3][4]=4;
	$user[3][5]=4;
	$user[3][6]=9;
	$user[3][7]=10;
	
	$user[4][1]=5;
	$user[4][2]=9;
	$user[4][3]=8;
	$user[4][4]=3;
	$user[4][5]=5;
	$user[4][6]=7;
	$user[4][7]=3;
	
	$user[5][1]=10;
	$user[5][2]=1;
	$user[5][3]=3;
	$user[5][4]=5;
	$user[5][5]=5;
	$user[5][6]=4;
	$user[5][7]=8;
	for ($i=1;$i<6;$i++){
		for ($j=1;$j<8;$j++){
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
	for ($i=1;$i<6;$i++){
		for ($j=1;$j<8;$j++){

	?>
	
	<td><?=$user[$i][$j];?></td>

	<?php 
		}
		echo "</tr>";
	}

	?>
	</table>
	<!--PENCARIAN rating 0 PADA TABEL-->
	<?php 
	for ($i=1;$i<6;$i++){
		for ($j=1;$j<8;$j++){
			if ($user[$i][$j]==0)
			$cari[$i][$j]=1;
		}
	}
	

	for ($i=1;$i<6;$i++){
		for ($j=1;$j<8;$j++){
		if($cari[$i][$j]!=0)
			echo $i.$j.$cari[$i][$j];
		}
	}
	
	
	
	/***************************************BARU**********************************/
	//Rata-rata user 1 ( user yang ingin diberi rekomendasi )
	for ($j=1;$j<7;$j++){
		$rata[1]+=$user[1][$j];
	}
	$rata[1]=$rata[1]/($j-1);
	
	
	//Rata-rata user 2-5
	for ($i=2;$i<6;$i++){
		for ($j=1;$j<8;$j++){
			$rata[$i]+=$user[$i][$j];
		}
		$rata[$i]=$rata[$i]/($j-1);
	}

	//menampilkan rata-rata tiap user
	for($i=1;$i<6;$i++){
		echo "<br> User ".$i." = ".$rata[$i];
	}
	
	//konversi tabel setelah dilakukan perhitungan Rating Ui - Rata2 Rating Ui
	//USER 1 (user yang ingin diberi rekomendasi)
	for($i=1;$i<7;$i++){
		$user[1][$i]-=$rata[1];
	}
	
	//USER 2-5
	for ($i=2;$i<6;$i++){
		for ($j=1;$j<8;$j++){
			$user[$i][$j]-=$rata[$i];
		}
	}
	
	//inisialisasi perhitungan A
	for ($i=1;$i<5;$i++){
		$jumA[$i]=0;
	}
	
	//perhitungan A : Sigma jumlah hasil konversi U1 dengan Ui
	for ($i=1;$i<5;$i++){
		for ($j=1;$j<7;$j++){
			//echo "<br>".$jumA[$i]." + (".$user[1][$j]." * ".$user[$i+1][$j].")";
			$jumA[$i]+=($user[1][$j]*$user[$i+1][$j]);
		}
	}
	
	//inisialisasi perhitungan B
	for ($i=1;$i<6;$i++){
		$akarB[$i]=0;
	}
	//perhitungan B : Akar sigma U1 - U5
	for ($i=1;$i<6;$i++){
		for ($j=1;$j<7;$j++){
			$akarB[$i]+=pow($user[$i][$j],2);
		}
		$akarB[$i] = sqrt($akarB[$i]);
	}
	
	//perhitungan C : B U1 dikali B Ui
	for ($i=1;$i<5;$i++){
		$jumC[$i]=$akarB[1]*$akarB[$i+1];
	}
	
	//Perhitungan A/C
	for ($i=1;$i<5;$i++){
		$sim[$i]=$jumA[$i]/$jumC[$i];
	}
	
	//Pemilihan similarity yg mendekati +1, dan menghitung prediksi
		$jumTerdekat = 0;
	
	//inisialisasi prediction A
		$sigmaA = 0;
		
	//inisialisasi sigma $sim terdekat
		$sigmaB=0;
	//perhitungan prediction A : sim[i] * user[i][7]
	for ($i=1;$i<5;$i++){
		if($sim[$i]>0){
		$sigmaA+=($sim[$i]*$user[$i][7]);	
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
	for ($i=1;$i<6;$i++){
		for ($j=1;$j<8;$j++){

	?>
	
	<td><?=$user[$i][$j];?></td>

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
	for($i=1;$i<5;$i++){
		echo "<br> User1 dengan User ".($i+1)." = ".$jumA[$i];
	}
	?>
	
	<br><br>
	AkarB
	<?php
	//menampilkan akarB
	for($i=1;$i<6;$i++){
		echo "<br> User ".($i)." = ".$akarB[$i];
	}
	?>
	<br><br>
	JumC
	<?php
	//menampilkan jumC = jumA/akarB
	for($i=1;$i<5;$i++){
		echo "<br> User ".($i)." = ".$jumC[$i];
	}
	?>
	
	<br><br>
	Similarity
	<?php
	//menampilkan sim
	for($i=1;$i<5;$i++){
		echo "<br> User ".($i)." = ".$sim[$i];
	}
	?>
	
	<br><br>
	Prediksi User 1 terhadap Item 7 = 
	<?php
	//menampilkan prediksi
		echo $pred;
	?>
</body>
</html>
	