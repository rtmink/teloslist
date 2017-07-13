<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
	header('Location: /');
  	exit();
}

if (isset($_GET['id']) && !empty($_GET['id']) && dga_img_check($_GET['id']) === true) {
	$dga_img_id = $_GET['id'];
	delete_dga_img($dga_img_id);
} else {
	include '../pnf.php';	
}
?>