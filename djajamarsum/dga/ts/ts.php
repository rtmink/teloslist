<?php

echo '<p class="dga_infoP">Posted</p>';	

if (acc_goal_check($dga_id) === true || $dga_type == 'a') {
	
	foreach ($dgas as $dga) {
		
		echo '<p>', time_posted($dga['ts']), '</p>';
		echo '<p class="dga_infoP">Accomplished</p>';
		echo '<p class="dga_infoP">', date('d F Y', $dga['ts_acc']), '</p>';
		
	}
		
} else {
	
	echo '<p class="dga_infoP">', time_posted($dga['ts']), '</p>';
	
}	
?>