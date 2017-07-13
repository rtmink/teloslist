<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && !empty ($_GET['g']) && isset($_GET['g']) && !empty ($_GET['t']) && isset($_GET['t']) && !empty ($_GET['v']) && isset($_GET['v'])) {
			
	$dga_id = $_GET['g'];
	$smart_type = $_GET['t'];
	$smart_value = $_GET['v'];
	$smart_check = smart_check($dga_id, $smart_type, 'na');
	
	if ($smart_check === false) {
		
		post_smart($dga_id, $smart_type, $smart_value);
		
	} else {
		
		$smart_id = $smart_check;
		
		if (smart_check($dga_id, $smart_type, $smart_value) === false) {
			edit_smart($smart_id, $dga_id, $smart_value);
		} else {
			delete_smart($smart_id, $dga_id);
		}							
	}
} else {
	include '../pnf.php';	
}
?>