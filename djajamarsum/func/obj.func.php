<?php
// Yes
// Post Objective
function post_obj($dga_id, $obj) {
	$dga_id = (int)$dga_id;
	
	mysql_query("INSERT INTO `objectives` VALUES ('', '$dga_id', '".logged_in()."', UNIX_timestamp(), '$obj', '')");
	
	$obj_id = mysql_insert_id();
	
	// Get Objective by Objective ID
	$obj = array();
	
	$obj_query = mysql_query("SELECT * FROM `objectives` WHERE `obj_id`=$obj_id");
	
	while ($obj_row = mysql_fetch_assoc($obj_query)) {
    	$obj[] = array(
			'id' => $obj_id,
			'dga_id' => $obj_row['dga_id'],
			'user_id' => $obj_row['user_id'],
			'ts' => $obj_row['ts'],
			'obj' => $obj_row['obj'],
			'checked' => $obj_row['checked']
		);
	}
	return $obj;
}
// -> Yes

// Yes
// Get Objective
function get_obj($dga_id) {
	$dga_id = (int)$dga_id;
	
	$obj = array();
	
	$obj_query = mysql_query("SELECT * FROM `objectives` WHERE `dga_id`=$dga_id ORDER BY `obj_id` DESC");
	
	while ($obj_row = mysql_fetch_assoc($obj_query)) {
    	$obj[] = array(
			'id' => $obj_row['obj_id'],
			'dga_id' => $obj_row['dga_id'],
			'user_id' => $obj_row['user_id'],
			'ts' => $obj_row['ts'],
			'obj' => $obj_row['obj'],
			'checked' => $obj_row['checked']
		);
	}
	return $obj;
}
// -> Yes

// Yes
// Get Checked Obj
function get_checked_obj($obj_id, $dga_id) {
	$obj_id = (int)$obj_id;
	$dga_id = (int)$dga_id;	
	$obj_query = mysql_query("SELECT `checked` FROM `objectives` WHERE `obj_id`=$obj_id AND `dga_id`=$dga_id AND `user_id`=".logged_in());
	return (mysql_result($obj_query, 0, 'checked'));
}
// -> Yes

// Yes
// Get # of Objective
function get_n_obj($dga_id) {
	$dga_id = (int)$dga_id;
	
	$obj_ns = array();
	
	$obj_ns_query = mysql_query("SELECT COUNT(obj) FROM `objectives` WHERE `dga_id`=$dga_id");
	
	while ($obj_ns_row = mysql_fetch_assoc($obj_ns_query)) {
    	$obj_ns[] = array(
	    	'count' => $obj_ns_row['COUNT(obj)']  
    	);
  	}
  	return $obj_ns;
}
// -> Yes

// Yes
// Reach Objective
function reach_obj($obj_id, $dga_id, $cb) {
	$obj_id = (int)$obj_id;
	$dga_id = (int)$dga_id;
	$cb = mysql_real_escape_string($cb);
	mysql_query("UPDATE `objectives` SET `checked`='$cb' WHERE `obj_id`=$obj_id AND `dga_id`=$dga_id AND `user_id`=".logged_in());
}
// Yes

// Yes
// Check Objective
function obj_check($obj_id) {
	$obj_id = (int)$obj_id;
  	$query = mysql_query("SELECT COUNT(`obj_id`) FROM `objectives` WHERE `obj_id`=$obj_id AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}
// -> Yes

// Yes
// Delete obj by ID
function delete_obj($obj_id) {
  	$obj_id = (int)$obj_id; 
  	mysql_query("DELETE FROM `objectives` WHERE `obj_id`=$obj_id AND `user_id`=".logged_in());
}
// -> Yes
?>