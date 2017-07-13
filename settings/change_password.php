<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
  header('Location: /');
  exit();
}

$page_title = 'Change Password &bull; Teloslist';
$https = 'on';
$navECT = true;

include '../djajamarsum/template/header.php';
?>

<ul class="dlm">
    <div id="dlmLine">
        <li><a href="update_details">Update Details</a></li>
        <li><a id="dlmCurrent" href="change_password">Change Password</a></li>
        <li class="dlm_last-child"><a href="upload_profile_img">Upload Image</a></li>
        <div class="clear"></div>
    </div>
</ul>

<div id="mainSett">	    
	<?php
    if (isset($_POST['old_password'], $_POST['new_password'], $_POST['retype_new_password'])) {
    
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$retype_new_password = $_POST['retype_new_password'];
		
		$errors = array();
		
		if (empty($old_password) || empty($new_password) || empty($retype_new_password)) {
			$errors[] = 'All fields required!';
		} else {		
			if (strlen($old_password) > 32 || strlen($new_password) > 32 || strlen($retype_new_password) > 32) {
				$errors[] = 'One or more fields contains too many characters';
			} else if(strlen($old_password) < 6 || strlen($new_password) < 6 || strlen($retype_new_password) < 6) {
				$errors[] = 'Password must be at least 6 characters';  
			} else {
				$old_password = md5($_POST['old_password']);
				$new_password = md5($_POST['new_password']);
				$retype_new_password = md5($_POST['retype_new_password']);
				$user_data = user_data('password'); 
				$old_password_db = $user_data['password']; 
				if ($old_password != $old_password_db) {
					$errors[] = 'Current password doesn\'t match'; 
				} 
				if ($new_password != $retype_new_password) {
					$errors[] = 'New passwords don\'t match';
				}    
			}		
		}		
		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo '<p class="red highlight">', $error, '</p>';
			}
		} else {
			$change_password = change_password($new_password);
			echo '<p class="green highlight">Password has been changed.</p>';
		}		
	} 
    ?>    
    <form class="form_sett" action="" method="post">
        <ul>
            <li>
                <label for="old_pswd">Current Password:</label>
                <div class="input_box"><input type="password" id="old_pswd" class="password" name="old_password" size="30" maxlength="35" autocomplete="off" /></div>
            </li>
            <li>
                <label for="new_pswd">New Password:</label>
                <div class="input_box"><input type="password" id="new_pswd" class="password" name="new_password" size="30" maxlength="35" autocomplete="off" /></div>
                <div id="password_error_msg"></div>
            </li>
            <li>
                <label for="retype_new_pswd">Retype New Password:</label>
                <div class="input_box"><input type="password" id="retype_new_pswd" class="password" name="retype_new_password" size="30" maxlength="35" autocomplete="off" /></div>
            </li>
        </ul>
        <div class="submit_button"><input type="submit" class="button" value="Change Password" /></div>
    </form>
</div>

<?php
include '../djajamarsum/template/footer.php';
?>