<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && !empty($_POST['cb_obj_id']) && !empty($_POST['cb_dga_id']) && isset ($_POST['cb_obj_id']) && isset($_POST['cb_dga_id'])) {
	
	$obj_id = $_POST['cb_obj_id'];
	$dga_id = $_POST['cb_dga_id'];
	
	$is = get_checked_obj($obj_id, $dga_id);
	
	if ($is == 'y') {
		reach_obj($obj_id, $dga_id, 'n');
	} else {
		reach_obj($obj_id, $dga_id, 'y');
	} 
		
} else {
	include '../pnf.php';	
}
?>