<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
	header('Location: /');
  	exit();
}

if (isset($_GET['id']) && !empty($_GET['id']) && com_check($_GET['id']) === true) {
	$com_id = $_GET['id'];
	delete_com($com_id);
} else {
	include '../pnf.php';	
}
?>