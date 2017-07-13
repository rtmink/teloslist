<?php
// Yes
// Check smart
function smart_check($dga_id, $type, $value) {
	$dga_id = (int)$dga_id;
	
	$query = "SELECT COUNT(`smart_id`), `smart_id` FROM `smart` WHERE `dga_id`=$dga_id  AND `user_id`=".logged_in()." AND `type`='$type'";
	
	if ($value == 'na') {
			
	} else {		
		$query .= " AND `value`='$value'";		
	}
	
	$query = mysql_query($query);
	return (mysql_result($query, 0) == 1) ? (mysql_result($query, 0, 'smart_id')) : false;
}
// -> Yes

// Yes
// Post smart
function post_smart($dga_id, $type, $value) {	
	$dga_id = (int)$dga_id;
	
  	mysql_query("INSERT INTO `smart` VALUES ('', '$dga_id', '".logged_in()."', '$type', '$value')");
}

// Edit smart
function edit_smart($smart_id, $dga_id, $value) {
	$smart_id = (int)$smart_id;
	$dga_id = (int)$dga_id;

	mysql_query("UPDATE `smart` SET `value`='$value' WHERE `smart_id`=$smart_id AND `dga_id`=$dga_id AND `user_id`=".logged_in());
}

// Delete smart
function delete_smart($smart_id, $dga_id) {
	$dga_id = (int)$dga_id;

	mysql_query("DELETE FROM `smart` WHERE `smart_id`=$smart_id AND `dga_id`=$dga_id AND `user_id`=".logged_in());
}
// -> Yes

// Yes
// Get smart
function get_smart($dga_id, $type) {
	$dga_id = (int)$dga_id;
	
	$smart = array();
	
	$smart_query = mysql_query("SELECT `value`, COUNT(`smart_id`) as `count` FROM `smart` WHERE `dga_id`=$dga_id AND `type`='$type'");
	
  	while ($smart_row = mysql_fetch_assoc($smart_query)) {
    	$smart[] = array(
	    	'value' => $smart_row['value'],
			'count' => $smart_row['count']
    	);
	}
	return $smart;
}
// -> Yes

// Yes
// Get smart # by type, value
function get_smart_tvn($dga_id, $type, $value) {
	$dga_id = (int)$dga_id;
	
	$smart_query = mysql_query("SELECT COUNT(`smart_id`) as `count` FROM `smart` WHERE `dga_id`=$dga_id  AND `type`='$type' AND `value`='$value'");
	
	return mysql_result($smart_query, 0, 'count');
}
// -> Yes
?>