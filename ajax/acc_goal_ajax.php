<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() &&!empty($_POST['goal_id_acc']) && isset($_POST['goal_id_acc'], $_POST['isDate']) && acc_goal_check_uid($_POST['goal_id_acc']) === false) {
	
	$goal_id = $_POST['goal_id_acc'];
	$isDate = $_POST['isDate'];
	
	post_acc_goal($goal_id, $isDate);
} else {
	include '../pnf.php';
}
?>