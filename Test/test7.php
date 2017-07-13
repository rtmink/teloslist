<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

//$array = array(1, 2, 3, 5, 6);
//print nl2br(print_r($array, true));

//echo tl_array_rand();

//print nl2br(print_r(get_id_dga(), true));

//$array = get_id_dga();
//shuffle($array);
/*
echo $array_size = count($array)."</br>";

for ($i = 0; $i < $array_size; $i++)
{ 
    //$rand_key = rand(0, $array_size - 1);
	//$rand_key = array_rand($array);
    //echo $rand_elem = $array[$rand_key]['dga_id']."\n";
	echo $rand_elem = $array[$i]['dga_id']."\n";
}
*/
//echo $array[0]['dga_id'];

//echo tl_array_rand();

// Randomize Array
function tl_array_rand() {
	
	$array = get_id_dga();	
	$array_size = count($array);
	
	$rand_key = rand(0, $array_size - 1);
	$rand_elem = $array[$rand_key]['dga_id'];
	
	return $rand_elem;
}

// Get dga id only 
function get_id_dga() {
	$dga = array();
	
	$dga_query = mysql_query("SELECT `dga_id` FROM `dga`");
	
	while ($dga[] = mysql_fetch_array($dga_query));
	
	return $dga;	
}

$dgas = get_rand_dga();

foreach($dgas as $dga) {
	echo $dga['id'];	
}
?>