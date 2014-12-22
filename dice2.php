<?php
include "koneksi.php";
// Calcul du coefficient de Dice
// Inspiration: http://en.wikibooks.org/wiki/Algorithm_Implementation/Strings/Dice%27s_coefficient
// Licence: Libre de droit
$query = mysql_query("select * from produk");
$cek = mysql_num_rows($query);
echo $cek;

	$arraydata = array();
	$i=0;
	while ($arrayQuery = mysql_fetch_array($query))
	{
		$arraydata[$i+1] = $arrayQuery['id_produk'];
		echo $arraydata[$i+1] ;
		echo "<br>";
		$i++;
		$arraydata[$i+1] = $arrayQuery['nama_produk'];
		echo $arraydata[$i+1] ;
		echo "<br>";
		$i++;
	}

	///Mengubah array data produk menjadi array 2 dimensi
	$items = array();
	$k = 1;
	for ($i=1;$i<=$cek;$i++)
	{
		for($j=0;$j<2;$j++)
		{
			$items[$i][$j] = $arraydata[$k];
			$k++;		
		}
		//$k += 1;
	}

	// for ($i=1;$i<=108;$i++)
	// {
	// 	echo $arraydata[$i];
	// 	echo "<br>hey";
	// }	
	// echo"ini";
echo "<br>";
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
					
	
	
	//perhitungan Similarity antara item 1 dengan 2-5
	for($i=1;$i<=107;$i++){
		$sim[$i] = dice($items[1][1],$items[$i+1][1]);
		echo "Similarity Item1 dengan Item".($i+1)." = ".$sim[$i]."</br>";
	}
	
	//cari nilai sim tertinggi
			$besar = -1;
			for ($i=1;$i<=107;$i++){
					if ($sim[$i]>$besar){
						$besar=$sim[$i];
						$dokumen=$i+1;
					}
			}
			
	echo "Jadi yang memiliki kemiripan paling tinggi terhadap Item1 = Item ".$dokumen." dengan nilai kemiripan = ".$besar;

//echo dice('', 'cdefghi').'<br />'; // test with a null string
//echo dice('Mistery Fiction', 'Mistery Murder').'<br />'; 
//echo dice('abcdefg', 'cdefghi').'<br />';
//echo dice('night', 'nacht nht').'<br />';
?>