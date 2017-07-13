<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
	header('Location: /');
  	exit();
}

if (isset($_GET['id']) && !empty($_GET['id']) && obj_check($_GET['id']) === true) {
	$obj_id = $_GET['id'];
	delete_obj($obj_id);
} else {
	include '../pnf.php';	
}
?>