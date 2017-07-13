<?php
// Yes
// check counter
function counter_check($dga_id) {
	$dga_id = (int)$dga_id;
  	$query = mysql_query("SELECT COUNT(`dga_id`) FROM `counter` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}

// Post counter
function post_counter($dga_id) {
	
	$dga_id = (int)$dga_id;
 
  	mysql_query("INSERT INTO `counter` VALUES ('', '$dga_id', '".logged_in()."')");
  	return mysql_insert_id();
}

// Get counter #
function get_ns_counter($dga_id) {
	$dga_id = (int)$dga_id;
	
	$counter_ns = array();
	
	$counter_ns_query = mysql_query("SELECT COUNT(counter_id) FROM `counter` WHERE `dga_id`=$dga_id");
	
  	while ($counter_ns_row = mysql_fetch_assoc($counter_ns_query)) {
    	$counter_ns[] = array(
	    	'count' => $counter_ns_row['COUNT(counter_id)']  
    	);
  	}
  	return $counter_ns;
}

// -> Yes
?>