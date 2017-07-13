<?php
$obj_date = time_posted($obj['ts']);

if (!logged_in()) {
	
	echo $obj_date;
	
} else {
	
	if ($user_id == logged_in()) {
		echo $obj_date, ' <a class="delete_obj" id="delete_obj_', $obj['id'],'" href="#"><span class="trash right"></span></a>';
	} else {
		echo $obj_date;			
	}
}
?>

