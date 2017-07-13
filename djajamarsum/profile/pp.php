<?php
if (!logged_in()) {

	if (empty($users)) {
	  include $include.'pnf.php';
	} else {
	  include $include.'other_hp.php';
	}
	
} else {
	
	$user_data = user_data('username', 'fullname', 'bio');
	
	if ($user_id == logged_in()) {
		include $include.'my_hp.php';
	} elseif (empty($users)) {
		include $include.'pnf.php'; 
	} else {
		include $include.'other_hp.php';
	}
}
?>