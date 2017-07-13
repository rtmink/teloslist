<?php
include 'counter_n/counter_n.php';
	
if (logged_in()) {	

	if ($user_id != logged_in()) {
		// if true, don't do anything
		if (counter_check($dga_id) === false) {
			post_counter($dga_id);	
		} 
	} 	
}
?>