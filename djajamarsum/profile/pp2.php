<?php
// Second Half of Page
if (isset($_GET['re']) && !empty($_GET['re'])) {

	$dgaLType = $_GET['re'];
	
	if ($dgaLType == 'dreams') {
		
		$dgaType = 'd';
		
	} else if ($dgaLType == 'goals') {
		
		$dgaType = 'g';
		
	} else if ($dgaLType == 'accomplishments') {
		
		$dgaType = 'a';
		
	} else if ($dgaLType == 'likes') {
		
		$dgaType = 'l';
		
	} else {
		
		$dgaType = 'none';
		
	}

} else {
	$dgaType = 'all';
}

if (!logged_in()) {
	
	if (!empty($users)) {		
		include $include.'goal_hp.php';	
	}
	
} else {

	if ($user_id == logged_in()) {
		include $include.'goal_hp.php';
	} else if (empty($users)) {
			
	} else {	
		include $include.'goal_hp.php';	
	}		 
}
?>