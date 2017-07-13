<?php
// Yes
function upload_profile_img($img_temp, $img_ext) {

	$img_name = name_img(7);
	
	mysql_query("INSERT INTO `p_img` VALUES ('', '".logged_in()."', '$img_name', UNIX_timestamp(), '$img_ext')");

  	$img_id = mysql_insert_id();
  	$img_file = $img_name.'.'.$img_ext;
  	move_uploaded_file($img_temp, '../xxx/uploads/p_img/org/'.$img_file);

  	create_profile_img_thumb('../xxx/uploads/p_img/org/', $img_file, '../xxx/uploads/p_img/pro/', 133, 133);
  	create_profile_img_thumb('../xxx/uploads/p_img/org/', $img_file, '../xxx/uploads/p_img/com/', 40, 40);
}
// -> Yes

// Yes
function get_profile_imgs() {
	$imgs = array();

  	$img_query = mysql_query("SELECT `img_id`, `name`, `ts`, `ext` FROM `p_img` WHERE `user_id`=".logged_in());
  	while ($imgs_row = mysql_fetch_assoc($img_query)) {
    	$imgs[] = array(
	    	'id' => $imgs_row['img_id'],
			'name' => $imgs_row['name'],
	      	'ts' => $imgs_row['ts'],
	      	'ext' => $imgs_row['ext']
    	);
  	}
  	return $imgs;
}
// -> Yes
// by user id
function show_profile_imgs($user_id) {
	$user_id = (int)$user_id;  

  	$imgs = array();

  	$img_query = mysql_query("SELECT `img_id`, `name`, `ts`, `ext` FROM `p_img` WHERE `user_id`=$user_id");
  	while ($imgs_row = mysql_fetch_assoc($img_query)) {
    	$imgs[] = array(
	    	'id' => $imgs_row['img_id'],
			'name' => $imgs_row['name'],
	      	'ts' => $imgs_row['ts'],
	      	'ext' => $imgs_row['ext']
    	);
  	}
  	return $imgs;
}
// No need
function profile_img_check($img_id) {
	$img_id = (int)$img_id;
  	$query = mysql_query("SELECT COUNT(`img_id`) FROM `p_img` WHERE `img_id`=$img_id AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}
// ???
// Yes
function delete_profile_img($img_id) {
	$img_id = (int)$img_id;

  	$img_query = mysql_query("SELECT `name`, `ext` FROM `p_img` WHERE `img_id`=$img_id AND `user_id`=".logged_in());
  	$img_result = mysql_fetch_assoc($img_query);

  	$img_name = $img_result['name'];
	$img_ext = $img_result['ext'];
	$img_file = $img_name.'.'.$img_ext;

  	unlink('../xxx/uploads/p_img/org/'.$img_file);
  	unlink('../xxx/uploads/p_img/pro/'.$img_file);
  	unlink('../xxx/uploads/p_img/com/'.$img_file);

  	mysql_query("DELETE FROM `p_img` WHERE `img_id`=$img_id AND `user_id`=".logged_in());
}
// -> Yes
?>