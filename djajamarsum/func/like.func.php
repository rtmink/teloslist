<?php

// Yes
// Check likes
function like_check($dga_id) {
	$dga_id = (int)$dga_id;
  	$query = mysql_query("SELECT COUNT(`dga_id`) FROM `likes` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}
// -> Yes

// Yes
// Post like
function post_like($dga_id) {
	$dga_id = (int)$dga_id;	
	mysql_query("INSERT INTO `likes` VALUES ('', '$dga_id', '".logged_in()."')");
}

// Delete like
function delete_like($dga_id) {
	$dga_id = (int)$dga_id;	
	mysql_query("DELETE FROM `likes` WHERE `dga_id`=$dga_id && `user_id`=".logged_in());
}
// -> Yes

// Yes
// Get likes
function get_likes($dga_id) {
	$dga_id = (int)$dga_id;
	
	$likes_n = array();
	
	$likes_n_query = mysql_query("SELECT COUNT(`like_id`) FROM `likes` WHERE `dga_id`=$dga_id");
	
	while ($likes_n_row = mysql_fetch_assoc($likes_n_query)) {
    	$likes_n[] = array(
			'count' => $likes_n_row['COUNT(`like_id`)']  
    	);
  	}
  	return $likes_n;
}
// -> Yes
?>