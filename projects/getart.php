<?php 
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

$page_title = 'ARTH 54 Study Guide &bull; Teloslist';

if (isset($_GET['art_id'])) {
	$art_id = mysql_real_escape_string($_GET['art_id']);
	$art_id = (int)$art_id;
	
	$query = mysql_query("SELECT * FROM `art_project` WHERE `art_id`=$art_id");
	$row = mysql_fetch_array($query);
	$retStr = $row['artist'].' * ';
	$retStr .= $row['title'].' * ';
	$retStr .= $row['year'];
	  
	echo $retStr; // this will be our return value to our ajax request
} else {
	include '../pnf.php';	
}
?>