<?php
for ($i=1;$i<500000;$i++){
		for ($j=1;$j<109;$j++){
			$query[$i][$j] = "select * from rating where id_user='$i' AND id_produk='$j'";
			

			$rs[$i][$j] = mysql_query($query[$i][$j]);
			$se[$i][$j] = mysql_fetch_array($rs[$i][$j]);
			echo $se[$i][$j]['rating'];
		}
	}
?>
