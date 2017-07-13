<?php
// Yes
// Post DGA
function post_dga($dga, $type, $img_file, $img_url, $isDate) {
	
	if ($isDate == '') {
		$isDate = time();
	} else {
		$isDate = strtotime($isDate);	
	}
	
	$img_temp_org = "xxx/uploads/preview/org/".$img_file;
	$img_temp_rs = "xxx/uploads/preview/rs/".$img_file;
	$img_temp_sm = "xxx/uploads/preview/sm/".$img_file;
	
	mysql_query("INSERT INTO `dga` VALUES ('', '".logged_in()."', UNIX_TIMESTAMP(), '$type', '$dga', 'n', '$isDate')");
	
	$dga_id = mysql_insert_id();
	
	// DGA
	if ($img_file != '' && $img_url == '') {
		
		$img_name = explode('.', $img_file);
		$img_id = get_img_id($img_name[0]);
		
		mysql_query("UPDATE `dga_img` SET `dga_id`= '$dga_id' WHERE `img_id` = '$img_id' AND `user_id`=".logged_in());
		
		rename('../'.$img_temp_org, '../xxx/uploads/dga_img/org/'.$img_file);
		rename('../'.$img_temp_rs, '../xxx/uploads/dga_img/rs/'.$img_file);
		rename('../'.$img_temp_sm, '../xxx/uploads/dga_img/sm/'.$img_file);
		
	}
	
	// URL
	if ($img_file == '' && $img_url != '') {
		
		upload_url_img($img_url, $type, $dga_id);
		
	}
	
	return $dga_id;
}
// -> Yes

// Yes
// Post Accomplished Goal
function post_acc_goal($dga_id, $isDate) {
	$dga_id = (int)$dga_id;
	
	if ($isDate == '') {
		$isDate = time();
	} else {
		$isDate = strtotime($isDate);
	}
	mysql_query("UPDATE `dga` SET `acc`='y', `ts_acc`='$isDate' WHERE `dga_id`=$dga_id AND `type`='g' AND `user_id`=".logged_in());	
}
// -> Yes

// Yes
// Check Accomplished Goal
function acc_goal_check($dga_id) {
	$dga_id = (int)$dga_id;
  	$query = mysql_query("SELECT COUNT(`dga_id`) FROM `dga` WHERE `dga_id`=$dga_id AND `type`='g' AND `acc`='y'");
  	return (mysql_result($query, 0) == 0) ? false : true;
}
// -> Yes

// Check Accomplished Goal by User ID
function acc_goal_check_uid($dga_id) {
	$dga_id = (int)$dga_id;
  	$query = mysql_query("SELECT COUNT(`dga_id`) FROM `dga` WHERE `dga_id`=$dga_id AND `type`='g' AND `acc`='y' AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}

// No need
// DGA Data
function dga_data($dga_id) {
	$dga_id = (int)$dga_id;
	
	$args = func_get_args();
	unset($args[0]);
	$fields = '`'.implode('`, `', $args).'`';
	
	$query = mysql_query("SELECT $fields FROM `dga` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
	$query_result = mysql_fetch_assoc($query);
	foreach ($args as $field) {
		$args[$field] = $query_result[$field];
	}
	return $args;
}


// Get DGA type
function dga_type($dga_id) {
	$dga_id = (int)$dga_id;
	$query = mysql_query("SELECT `type` FROM `dga` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
	//return (mysql_result($query, 0) == 0) ? false : (mysql_result($query, 0, 'type'));
	return mysql_result($query, 0, 'type');
}

// Check DGA
function dga_check($dga_id) {
	$dga_id = (int)$dga_id;
	$query = mysql_query("SELECT COUNT(`dga_id`) FROM `dga` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
	return (mysql_result($query, 0) == 0) ? false : true;
}
// ???

// Yes
// Get all
function get_dga($type) {	
	$dga = array();
	
	$dga_query = "SELECT * FROM `dga`";
	
	if ($type == 'all') {
		
	} else {
		
		$dga_query .= " WHERE `type`='$type'";		
	}
	
	$dga_query .= " ORDER BY `dga_id` DESC";
	$dga_query = mysql_query($dga_query);
	
	while ($dga_row = mysql_fetch_assoc($dga_query)) {
		$dga[] = array(
			'id' => $dga_row['dga_id'],
			'user_id' => $dga_row['user_id'],
			'ts' => $dga_row['ts'],
			'type' => $dga_row['type'],
			'dga' => $dga_row['dga'],
			'acc' => $dga_row['acc'],
			'ts_acc' => $dga_row['ts_acc']  
		);
	 }
	 return $dga;
}
// -> Yes

// Yes
// Get dga by dga ID
function get_dga_id($dga_id, $type) {
	$dga_id = (int)$dga_id;	

  	$dga = array();

	$dga_query = mysql_query("SELECT `dga_id`, `user_id`, `ts`, `dga`, `acc`, `ts_acc` FROM `dga` WHERE `dga_id`=$dga_id AND `type`='$type'");
	while ($dga_row = mysql_fetch_assoc($dga_query)) {
		$dga[] = array(
			'id' => $dga_row['dga_id'],
			'user_id' => $dga_row['user_id'],
			'ts' => $dga_row['ts'],
			'dga' => $dga_row['dga'],
			'acc' => $dga_row['acc'],
			'ts_acc' => $dga_row['ts_acc']  
		);
	}
	return $dga;
}
// -> Yes

// Get dga by user ID ------- `acc`='n' AND
// Yes 
function get_dga_uid($user_id, $type) {
	$user_id = (int)$user_id;	

  	$dga = array();
	
	if ($type == 'l') {
		
		$dga_query = "SELECT `likes`.`dga_id`, `dga`.`user_id`, `dga`.`ts`, `dga`.`type`, `dga`.`dga` FROM `dga`, `likes` WHERE ";
		
		$dga_query .= "`dga`.`dga_id`=`likes`.`dga_id` AND `likes`.`user_id`=$user_id";
		
	} else {
		$dga_query = "SELECT `dga_id`, `user_id`, `ts`, `type`, `dga` FROM `dga` WHERE ";
		
		$dga_query .= "`user_id`=$user_id";	
		
		if ($type == 'a') {
		
			$dga_query .= " AND (`type`='$type' OR `acc`='y')";
			
		} else if ($type == 'all') {
			
		} else {
	
			$dga_query .= " AND (`type`='$type' AND `acc`='n')";			
		}
	}
	
	$dga_query .= " ORDER BY `ts` DESC";
	$dga_query = mysql_query($dga_query);
	
	while ($dga_row = mysql_fetch_assoc($dga_query)) {
    	$dga[] = array(
	    	'id' => $dga_row['dga_id'],
			'user_id' => $dga_row['user_id'],
	    	'ts' => $dga_row['ts'],
			'type' => $dga_row['type'],
			'dga' => $dga_row['dga'] 
    	);
  	}
  	return $dga;
}
// -> Yes

// ???
// Get random dga
function get_rand_dga() {

	$counts = get_n_dga('all');
	
	foreach ($counts as $count) {
		$randVal = rand(0, $count['count'] - 1);	
	}
	
	$dga = array();

	$dga_query = mysql_query("SELECT * FROM `dga` LIMIT 1 OFFSET ".$randVal);
	while ($dga_row = mysql_fetch_assoc($dga_query)) {
		$dga[] = array(
			'id' => $dga_row['dga_id'],
			'user_id' => $dga_row['user_id'],
			'ts' => $dga_row['ts'],
			'type' => $dga_row['type'],
			'dga' => $dga_row['dga'],
			'acc' => $dga_row['acc'],
			'ts_acc' => $dga_row['ts_acc']
		);
	}
	return $dga;		
}
// ???

// Get number of dga
function get_n_dga($type) {
	$dga_n = array();
	
	$dga_n_query = "SELECT COUNT(`dga_id`) FROM `dga`";
	
	if ($type != 'all') {
		$dga_n_query .= " WHERE `type`='$type'";
	}
	
	$dga_n_query = mysql_query($dga_n_query);
	
	//$dga_n_query = mysql_query("SELECT COUNT(`dga_id`) FROM `dga` WHERE `type`='$type'");
	
  	while ($dga_n_row = mysql_fetch_assoc($dga_n_query)) {
		$dga_n[] = array(
			'count' => $dga_n_row['COUNT(`dga_id`)']  
		);
  	}
  	return $dga_n;
}

// Yes
// Delete dga
function delete_dga($dga_id, $img_file) {
	
  $dga_id = (int)$dga_id;
  
  mysql_query("DELETE FROM `dga` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
  
  // Picture
  mysql_query("DELETE FROM `dga_img` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
  
  unlink('../xxx/uploads/dga_img/org/'.$img_file);
  unlink('../xxx/uploads/dga_img/rs/'.$img_file);
  unlink('../xxx/uploads/dga_img/sm/'.$img_file);
  
  // Objective
  mysql_query("DELETE FROM `objectives` WHERE `dga_id`=$dga_id");
  // Counter
  mysql_query("DELETE FROM `counter` WHERE `dga_id`=$dga_id");
  // Like
  mysql_query("DELETE FROM `likes` WHERE `dga_id`=$dga_id");
  // Smart
  mysql_query("DELETE FROM `smart` WHERE `dga_id`=$dga_id");
  // Comment
  mysql_query("DELETE FROM `comments` WHERE `dga_id`=$dga_id");
}
// -> Yes
?>