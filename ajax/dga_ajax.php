<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

// DGA - Textarea
if (logged_in() && isset($_POST['dga_type']) && !empty($_POST['dga_type'])) {
	
	$type = $_POST['dga_type'];
	
	if (isset($_POST['dga'], $_POST['dga_file'], $_POST['dga_url'], $_POST['isDate']) && !empty($_POST['dga'])) {
		
		$dga_file = $_POST['dga_file'];
		$dga_url = $_POST['dga_url'];
		$isDate =  $_POST['isDate'];
		
		$dga = $_POST['dga'];
		$dga = check_values($dga);	
		
		$post_dga = post_dga($dga, $type, $dga_file, $dga_url, $isDate);
		$x = $post_dga;
		
		echo '<input type="hidden" class="dgax" id="dgax_'.$x.'" value="'.$x.'" />';
	} 
			
} else {
	include '../pnf.php';	
}
?>