<?php
// Calcul du coefficient de Dice
// Inspiration: http://en.wikibooks.org/wiki/Algorithm_Implementation/Strings/Dice%27s_coefficient
// Licence: Libre de droit

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
					
	$item[1][0] = 8;	$item[1][1] = "Mistery Fiction";	 	//item 1
	$item[2][0] = 19;	$item[2][1] = "Mistery Murder";		 	//item 2
	$item[3][0] = 21;	$item[3][1] = "Journalism Romance";	 	//item 3
	$item[4][0] = 23;	$item[4][1] = "Romance Fiction";	
	$item[5][0] = 54;	$item[5][1] = "Murder Mistery";	
	
	//perhitungan Similarity antara item 1 dengan 2-5
	for($i=1;$i<=4;$i++){
		$sim[$i] = dice($item[1][1],$item[$i+1][1]);
		echo "Similarity Item1 dengan Item".($i+1)." = ".$sim[$i]."</br>";
	}
	
	//cari nilai sim tertinggi
			$besar = -1;
			for ($i=1;$i<=4;$i++){
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