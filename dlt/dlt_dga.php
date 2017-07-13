<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
	header('Location: /');
  	exit();
}

if (isset($_GET['id']) && !empty($_GET['id']) && dga_check($_GET['id']) === true) {
	$user_data = user_data('username');
	
	$dga_id = $_GET['id'];
  
	$show_dga_imgs = get_dga_imgs($dga_id);
  
	foreach ($show_dga_imgs as $show_dga_img) {
		
		$img_file = $show_dga_img['name'].'.'.$show_dga_img['ext'];		
	}
  
	delete_dga($dga_id, $img_file);
 
	header('Location: /u/'.$user_data['username']);
	exit();
	
} else {
	include '../pnf.php';	
}
?>