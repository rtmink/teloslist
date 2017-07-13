<?php
// Second Half of Page
$relType = $_GET['re'];

if (!logged_in()) {
	
	if (!empty($users) && $relType != 'block') {		
		include $include.'support/support_body.php';	
	}
	
} else {

	if ($user_id == logged_in()) {
		include $include.'support/support_body.php';
	} else if (empty($users)) {
			
	} else {
		if ($relType != 'block') {	
			include $include.'support/support_body.php';
		}
	}		 
}
?>