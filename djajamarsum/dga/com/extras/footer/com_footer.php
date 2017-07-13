<?php
$com_date = time_posted($com['ts']);

if (!logged_in()) {
	
	echo $com_date;
	
} else {

	if ($user_id_com == logged_in()) {
		
		echo $com_date, ' <a class="delete_com" id="delete_com_', $com['id'],'" href="#"><span class="trash right"></span></a>';
		
	} else {
		
		echo $com_date;	
	}
}
?>

