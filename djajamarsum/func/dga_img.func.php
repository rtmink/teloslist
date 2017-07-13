<?php
// Yes
// Check width of img
function getTheImageSize($image, $directory, $img_id) {
	$image = $directory.$image;
	$source_size = getimagesize($image);
	
	if ($source_size !== false) {
	
	  switch($source_size['mime']) {
		case 'image/jpeg':
			 $source = imagecreatefromjpeg($image);
		break;
		case 'image/png':
			 $source = imagecreatefrompng($image);
		break;
		case 'image/gif':
			 $source = imagecreatefromgif($image);
		break;
	  }
	}
	
	$img_width = imagesx($source);
	$img_height = imagesy($source);
	
	mysql_query("UPDATE `dga_img` SET `width`='$img_width', `height`='$img_height'  WHERE `img_id`='$img_id' AND `user_id`=".logged_in());
}
// -> Yes

// Yes
// Upload DGA Img
function upload_dga_img($img_temp, $img_type, $img_ext) {
	$img_name = name_img(29);
	
	mysql_query("INSERT INTO `dga_img` VALUES ('', '0', '".logged_in()."', '$img_name', UNIX_timestamp(), '$img_type', '$img_ext', '', '', '')");
	
  	$img_id = mysql_insert_id();
	$img_file = $img_name.'.'.$img_ext;
	
	move_uploaded_file($img_temp, '../xxx/uploads/preview/org/'.$img_file);
	
	$image_sizes = getTheImageSize($img_file, '../xxx/uploads/preview/org/', $img_id);
	
  	create_dga_img_rs('../xxx/uploads/preview/org/', $img_file, '../xxx/uploads/preview/rs/', 445);
	create_dga_img_rs('../xxx/uploads/preview/org/', $img_file, '../xxx/uploads/preview/sm/', 222);
  
  	return $img_file;
}
// -> Yes

// Yes
// Upload URL Img
function upload_url_img($img_url, $img_type, $dga_id) {

	$imgType = exif_imagetype($img_url);

	if ($imgType == IMAGETYPE_GIF) {
		
		$img_ext = 'gif';
		
	} else if ($imgType == IMAGETYPE_JPEG) {
		
		$img_ext = 'jpg';
		
	} else if ($imgType == IMAGETYPE_PNG) {
		
		$img_ext = 'png';
		
	} else {
		
		$img_url_info = pathinfo($img_url);
		$img_ext = $img_url_info['extension'];
	
	}
	
	$img_name = name_img(29);
	
	mysql_query("INSERT INTO `dga_img` VALUES ('', '$dga_id', '".logged_in()."', '$img_name', UNIX_timestamp(), '$img_type', '$img_ext', '$img_url', '$img_width', '$img_height')");
	
  	$img_id = mysql_insert_id();
	$img_file = $img_name.'.'.$img_ext;
	
	$img_org = '../xxx/uploads/dga_img/org/'.$img_file;
	// over 30 secs 
	//file_put_contents($img_org, file_get_contents($img_url));
	
	$ch = curl_init($img_url);
	$fp = fopen($img_org, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
	
	$image_sizes = getTheImageSize($img_file, '../xxx/uploads/dga_img/org/', $img_id);	
  	
  	create_dga_img_rs('../xxx/uploads/dga_img/org/', $img_file, '../xxx/uploads/dga_img/rs/', 445);
	create_dga_img_rs('../xxx/uploads/dga_img/org/', $img_file, '../xxx/uploads/dga_img/sm/', 222); 
}
// -> Yes

// Yes
function get_dga_imgs($dga_id) {
	$dga_id = (int)$dga_id;
	
	$imgs = array();

  	$img_query = mysql_query("SELECT `img_id`, `name`, `ts`, `type`, `ext`, `url`, `width`, `height` FROM `dga_img` WHERE `dga_id`=$dga_id AND `user_id`=".logged_in());
  	while ($imgs_row = mysql_fetch_assoc($img_query)) {
    	$imgs[] = array(
	    	'id' => $imgs_row['img_id'],
			'name' => $imgs_row['name'],
	      	'ts' => $imgs_row['ts'],
		  	'type' => $imgs_row['type'],
	      	'ext' => $imgs_row['ext'],
			'url' => $imgs_row['url'],
			'width' => $imgs_row['width'],
			'height' => $imgs_row['height']
    	);
  	}
  	return $imgs;
}
// -> Yes

// Yes
// by dga id
function show_dga_imgs($dga_id, $user_id) {
	$dga_id = (int)$dga_id;
	$user_id = (int)$user_id;  
	
  	$imgs = array();

  	$img_query = mysql_query("SELECT `img_id`, `name`, `ts`, `type`, `ext`, `url`, `width`, `height` FROM `dga_img` WHERE `dga_id`=$dga_id AND `user_id`=$user_id");
  		while ($imgs_row = mysql_fetch_assoc($img_query)) {
    	$imgs[] = array(
	    	'id' => $imgs_row['img_id'],
			'name' => $imgs_row['name'],
	      	'ts' => $imgs_row['ts'],
		  	'type' => $imgs_row['type'],
	      	'ext' => $imgs_row['ext'],
			'url' => $imgs_row['url'],
			'width' => $imgs_row['width'],
			'height' => $imgs_row['height']
    	);

  	}
  	return $imgs;
}
// -> Yes

// Yes
function get_img_id($img_name) {
	$img_name = mysql_real_escape_string($img_name);
  	$query = mysql_query("SELECT COUNT(`img_id`), `img_id` FROM `dga_img` WHERE `name`='$img_name' AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 1) ? mysql_result($query, 0, 'img_id') : false;		
}
// -> Yes

function dga_img_check($img_id) {
	$img_id = (int)$img_id;
  	$query = mysql_query("SELECT COUNT(`img_id`) FROM `dga_img` WHERE `img_id`=$img_id AND `dga_id`='0' AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 0) ? false : true;
}

// Yes
function dga_img_check_type($img_type) {
	$query = mysql_query("SELECT COUNT(`img_id`), `img_id` FROM `dga_img` WHERE `dga_id`='0' AND `type`='$img_type' AND `user_id`=".logged_in());
  	return (mysql_result($query, 0) == 1) ? mysql_result($query, 0, 'img_id') : false;
}
// -> Yes

// Yes
function delete_dga_img($img_id) {
	$img_id = (int)$img_id;

  	$img_query = mysql_query("SELECT `name`, `ext` FROM `dga_img` WHERE `img_id`=$img_id AND `user_id`=".logged_in());
  	$img_result = mysql_fetch_assoc($img_query);

  	$img_file = $img_result['name'].'.'.$img_result['ext'];

  	unlink('../xxx/uploads/preview/org/'.$img_file);
  	unlink('../xxx/uploads/preview/rs/'.$img_file);
	unlink('../xxx/uploads/preview/sm/'.$img_file);

  	mysql_query("DELETE FROM `dga_img` WHERE `img_id`=$img_id AND `user_id`=".logged_in());
}
// -> Yes
?>