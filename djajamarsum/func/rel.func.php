<?php
// Yes
// Check rel
function rel_check($user_id, $type) {
	$user_id = (int)$user_id;
	
	if ($type == 'uB') {
	
		$query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `b_id`='$user_id' AND `a_id`=".logged_in()." AND `info`=''");
		
	} else if ($type == 'iB') {
		
		$query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `a_id`='$user_id' AND `b_id`=".logged_in()." AND `info`=''");
		
	} else if ($type == 'block') {
	
		$query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `info`='block' AND `b_id`='$user_id' AND `a_id`=".logged_in());
		
	} else if ($type == 'blocked') {
		
		$query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `info`='blocked' AND `a_id`='$user_id' AND `b_id`=".logged_in());
	
	} else if ($type == 'iBlocked') {
		
		$query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `info`='blocked' AND `b_id`='$user_id' AND `a_id`=".logged_in());
	
	}
	
  	return (mysql_result($query, 0) == 0) ? false : true;
}
// -> Yes

// Yes
// Post rel
function post_rel($user_id) {
	$user_id = (int)$user_id;
	
	mysql_query("INSERT INTO `relationships` VALUES ('', '".logged_in()."', '$user_id', '')");
}
// -> Yes

// Yes
// Block rel 
function block_rel($user_id) {
	$user_id = (int)$user_id;
	
	if (rel_check($user_id, 'uB') === false) {
		
		mysql_query("INSERT INTO `relationships` VALUES ('', '".logged_in()."', '$user_id', 'block')");
		
	} else {
		
		mysql_query("UPDATE `relationships` SET `info`='block' WHERE `b_id`='$user_id' AND `a_id`=".logged_in());
		
	}
	
	if (rel_check($user_id, 'iB') === false) {
		
		mysql_query("INSERT INTO `relationships` VALUES ('', '$user_id', '".logged_in()."', 'blocked')");
		
	} else {
		
		mysql_query("UPDATE `relationships` SET `info`='blocked' WHERE `a_id`='$user_id' AND `b_id`=".logged_in());
		
	}	
}
// -> Yes

// Get rel id
function get_rel($user_id) {
	$user_id = (int)$user_id;
	
	$get_rel = array();
	
	$get_rel_query = mysql_query("SELECT `b_id` FROM `relationships` WHERE `a_id`='$user_id' AND `info`=''");	
	while ($get_rel_row = mysql_fetch_assoc($get_u_query)) {
		$get_rel[] = array(
			'id' => $get_u_row['b_id']
		);
	}
	return $get_rel;
}

// Yes
// Get supporting/supporters
function get_uab($user_id, $type) {
	$user_id = (int)$user_id;
	
	$get_uab = array();
	
	if ($type == 'b') {
		
		//Supporting
		$get_uab_query = mysql_query("SELECT `b_id` FROM `relationships` WHERE `a_id`='$user_id' AND `info`=''");	
		
	} else if ($type == 'a') {
		
		// Supporters
		$get_uab_query = mysql_query("SELECT `a_id` FROM `relationships` WHERE `b_id`='$user_id' AND `info`=''");
		
	} else if ($type == 'bl') {
		
		// Block
		$get_uab_query = mysql_query("SELECT `b_id` FROM `relationships` WHERE `a_id`='$user_id' AND `info`='block'");
		
	}
	
	while ($get_uab_row = mysql_fetch_assoc($get_uab_query)) {
		
		if ($type == 'b') {
			$get_uab[] = array('id' => $get_uab_row['b_id']);
		} else if ($type == 'a') {
			$get_uab[] = array('id' => $get_uab_row['a_id']);
		} else if ($type == 'bl') {
			$get_uab[] = array('id' => $get_uab_row['b_id']);
		}
		
	}
	return $get_uab;
}
// -> Yes

// Yes
// Delete rel
function dlt_rel($user_id, $type) {
	$user_id = (int)$user_id;
	
	if ($type == 'uB') {
	
		mysql_query("DELETE FROM `relationships` WHERE `b_id`='$user_id' AND `a_id`=".logged_in());
		
	} else if ($type == 'iB') {
		
		mysql_query("DELETE FROM `relationships` WHERE `a_id`='$user_id' AND `b_id`=".logged_in());
		
	} 
}
// -> Yes

// Yes
// Count rel
function count_rel($user_id, $type) {
	$user_id = (int)$user_id;
	
	$count_rel = array();
	
	if ($type == 'aU') {
	
		$count_rel_query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `a_id`='$user_id' AND `info`=''");
		
	} else if ($type == 'bU') {
		
		$count_rel_query = mysql_query("SELECT COUNT(`rel_id`) FROM `relationships` WHERE `b_id`='$user_id' AND `info`=''");
		
	}
	
	while ($count_rel_row = mysql_fetch_assoc($count_rel_query)) {
    	$count_rel[] = array(
			'count' => $count_rel_row['COUNT(`rel_id`)']  
    	);
  	}
  	return $count_rel;
}
// -> Yes
?>