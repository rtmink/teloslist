<?php
// Yes
// Post Comment
function post_com($dga_id, $com) {
	
	$dga_id = (int)$dga_id;
	
	mysql_query("INSERT INTO `comments` VALUES ('', '$dga_id', '".logged_in()."', UNIX_timestamp(), '$com')");
	
	$com_id = mysql_insert_id();
	
	// Get Commment by Comment ID
	$com = array();
	
	$com_query = mysql_query("SELECT `user_id`, `ts`, `com`  FROM `comments` WHERE `com_id`=$com_id");
	
	while ($com_row = mysql_fetch_assoc($com_query)) {
    	$com[] = array(
			'id' => $com_id,
			'user_id' => $com_row['user_id'],
			'ts' => $com_row['ts'],
			'com' => $com_row['com']
		);
	}
	return $com;
}
// -> Yes

// Yes
// Get Comment
function get_com($dga_id) {
	$dga_id = (int)$dga_id;
	
	$com = array();
	
	$com_query = mysql_query("SELECT `com_id`, `user_id`, `ts`, `com` FROM `comments` WHERE `dga_id`=$dga_id ORDER BY `com_id` DESC");
	
	while ($com_row = mysql_fetch_assoc($com_query)) {
    	$com[] = array(
			'id' => $com_row['com_id'],
			'user_id' => $com_row['user_id'],
			'ts' => $com_row['ts'],
			'com' => $com_row['com']
		);
	}
	return $com;
}

// Get # of Comments
function get_n_com($dga_id) {
	$dga_id = (int)$dga_id;
	
	$com = array();
	
	$com_query = mysql_query("SELECT COUNT(com) FROM `comments` WHERE `dga_id`=$dga_id");
	
	while ($com_row = mysql_fetch_assoc($com_query)) {
    	$com[] = array(
	    	'count' => $com_row['COUNT(com)']  
    	);
  	}
  	return $com;
}
// -> Yes

// Yes
// Check com
function com_check($com_id) {
	$com_id = (int)$com_id;
  	$query = mysql_query("SELECT COUNT(`com_id`) FROM `comments` WHERE `com_id`=$com_id AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}

// Delete com by ID
function delete_com($com_id) {
  	$com_id = (int)$com_id;
  
  	mysql_query("DELETE FROM `comments` WHERE `com_id`=$com_id AND `user_id`=".logged_in());
}
// -> Yes
?>