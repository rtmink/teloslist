<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
	header('Location: /');
  	exit();
}

if (isset($_GET['img_id']) && !empty($_GET['img_id']) && profile_img_check($_GET['img_id']) === true) {
  delete_profile_img($_GET['img_id']);
  header('Location: '.$_SERVER['HTTP_REFERER']);
  exit();
} else {
	include '../pnf.php';	
}

?>