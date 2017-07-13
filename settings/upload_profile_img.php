<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';
if (!logged_in()) {
  header('Location: /');
  exit();
}

$page_title = 'Upload Profile Image &bull; Teloslist';
$navECT = true;

include '../djajamarsum/template/header.php';
?>

<ul class="dlm">
    <div id="dlmLine">
        <li><a href="update_details">Update Details</a></li>
        <li><a href="change_password">Change Password</a></li>
        <li class="dlm_last-child"><a id="dlmCurrent" href="upload_profile_img">Upload Image</a></li>
        <div class="clear"></div>
    </div>
</ul>
    
<div id="mainSett">
	
<?php

if (isset($_FILES['profile_img'])) {
	$img_name = $_FILES['profile_img']['name']; 
  	$img_size = $_FILES['profile_img']['size'];
  	$img_temp = $_FILES['profile_img']['tmp_name'];

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

    if ($img_size > 4194304) {
    	$errors[] = 'Maximum file size is 4 MB.';
    }
}

if (!empty($errors)) {
	foreach ($errors as $error) {
    	echo '<p class="red highlight">', $error, '</p>';
    }
} else { 
	$imgs = get_profile_imgs();

    if (empty($imgs)) {
    	upload_profile_img($img_temp, $img_ext);
      	header('Location: '.$_SERVER['HTTP_REFERER']);
      	exit();
    } else {
      
		foreach ($imgs as $img) {
      		$img_id = $img['id'];
      	}
		
      	delete_profile_img($img_id);      

      	$upload_profile_img = upload_profile_img($img_temp, $img_ext);
      	header('Location: '.$_SERVER['HTTP_REFERER']);
      	exit();  
	  }
	}
}

$imgs = get_profile_imgs();
?>
<div id="mainSett_upl">
	<div id="img_sett">
	<?php
	if (empty($imgs)) {
		echo '<img src="../xxx/img/prof.gif" />';
	} else {
		foreach ($imgs as $img) {
			echo '<a href="../xxx/uploads/p_img/org/'.$img['name'].'.'.$img['ext'].'"><img src="../xxx/uploads/p_img/pro/'.$img['name'].'.'.$img['ext'].'" alt="" /></a>'; 
		}
	} 
	?>
	</div>
	<form class="left" action="" method="post" enctype="multipart/form-data" >
		<div id="img_btn_sett_top">
        	<input type="file" name="profile_img" />
        </div>
		<div id="img_btn_sett_bottom">
			<input type="submit" class="buttonL" value="Upload" />
			<?php
			if (!empty($imgs)) {
				echo '<a href="../dlt/dlt_p_img.php?img_id=', $img['id'], '"><input type="button" class="buttonR pressed" value="Delete" /></a>';
			}
			?>
		</div>
	</form>
	<div class="clear"></div>
	</div>
</div>

<?php
include '../djajamarsum/template/footer.php';
?>