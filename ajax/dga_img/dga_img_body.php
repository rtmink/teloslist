<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && isset($_FILES[$dga_type])) {
	$img_name = $_FILES[$dga_type]['name']; 
  	$img_size = $_FILES[$dga_type]['size'];
  	$img_temp = $_FILES[$dga_type]['tmp_name'];

  	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
  	$tmp = explode('.', $img_name);
  	$img_ext = strtolower(end($tmp));

  	$errors = array();

  	if (empty($img_name)) {
    	$errors[] = 'Please select a file.';
  	} else {
    
    	if (in_array($img_ext, $allowed_ext) === false) {
       		$errors[] = 'File type not allowed.';
     	}

     	if ($img_size > 7340032) {
       		$errors[] = 'Maximum file size is 7 MB.';
     	}

  	}

  	if (!empty($errors)) {
    	foreach ($errors as $error) {
      		echo '<p class="red textShadow" >', $error, '</p>';
    	}
	
	} else { 
  
		$check_type = dga_img_check_type($img_type);
		
		if ($check_type === false) {
			
			$upload_dga_img = upload_dga_img($img_temp, $img_type, $img_ext);
		 
		} else {
			
			$img_id = $check_type;
		  
			delete_dga_img($img_id);      
	
			$upload_dga_img = upload_dga_img($img_temp, $img_type, $img_ext);
		  
		}
		
		$img_file = $upload_dga_img;
		$dga_img_name = explode('.', $img_file);
		$dga_img_id = get_img_id($dga_img_name[0]);
		
		if ($img_type == 'd') {
			$img_type2 = 'dream';
			$img_type = 'dlt_img_dream';
		} elseif ($img_type == 'g') {
			$img_type2 = 'goal';
			$img_type = 'dlt_img_goal';
		} elseif ($img_type == 'a') {
			$img_type2 = 'acc';
			$img_type = 'dlt_img_acc';
		} 
		
		echo '<span class="left"><p class="brown textShadow">Click Share to post the picture!</p></span>';
		echo '<span class="right trash2 dlt_dga_img ', $img_type,'" id="dlt_dga_img_', $dga_img_id,'"></span>';
		echo '<div class="clear"></div>';
		echo '<img class="dga_img_rs" src="/xxx/uploads/preview/sm/', $img_file,'" />';
		echo '<input type="hidden" id="', $img_type2,'_img_file" value="', $img_file,'" />';
		echo '<script type="text/javascript" src="/xxx/js/del_dga_img.js"></script>';
	}
  
} else {
	include '../pnf.php';	
}
?>