<?php
//include '../djajamarsum/has_ie_ratu/hasieratu2.php';
include 'djajamarsum/has_ie_ratu/hasieratu.php';

if ($_SERVER["SERVER_PORT"] != "80") {
//if(empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!="on") {
	$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	//header("Location:$redirect");
	echo 'off';
} else {
	echo 'on';	
}
?>