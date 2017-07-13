<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && !empty ($_POST['dga_id_like']) && isset($_POST['dga_id_like'])) {
	
	$dga_id = $_POST['dga_id_like'];
	
	if (like_check($_POST['dga_id_like']) === false) {
		post_like($dga_id);
	} else {
		delete_like($dga_id);
	}
	
	
} else {
	include '../pnf.php';	
}
?>