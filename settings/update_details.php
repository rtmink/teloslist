<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (!logged_in()) {
  header('Location: /');
  exit();
}

$page_title = 'Update Details &bull; Teloslist';
$https = 'on';
$navECT = true;

include '../djajamarsum/template/header.php';
?>

<ul class="dlm">
	<div id="dlmLine">
        <li><a id="dlmCurrent" href="update_details">Update Details</a></li>
        <li><a href="change_password">Change Password</a></li>
        <li class="dlm_last-child"><a href="upload_profile_img">Upload Image</a></li>
        <div class="clear"></div>
    </div>
</ul>

<div id="mainSett">
	<?php
    $user_data = user_data('email', 'username', 'fullname', 'bio');
    
    if (isset($_POST['change_email'], $_POST['change_username'], $_POST['change_fullname'])) {
		$change_email = check_values2($_POST['change_email']);
		$change_username = check_values2($_POST['change_username']);
		$change_fullname = check_values2($_POST['change_fullname']);
		$bio = check_values2($_POST['bio']);
		
		$errors = array();
		
		if (empty($change_email) || empty($change_username) || empty($change_fullname)) {
			$errors[] = 'All fields except \'Bio\' required!';
		} else {
			if (filter_var($change_email, FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'Invalid email address.';
			} 
			if (strlen($change_email) > 255 || strlen($change_username) > 25 || strlen($change_fullname) > 20 || strlen($bio) > 160) {
				$errors[] = 'One or more fields contains too many characters.';
			}
			if (check_email($change_email) === true) {
				$errors[] = 'Desired email address is already in use.';
			}	
			if (check_username($change_username) === true || block_username($change_username) === true) {
				$errors[] = 'Desired username is already in use.';
			}
			if (check_alphan($change_username) == 'bad') {
				$errors[] = 'Invalid Username.';
			}		
		}
		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo '<p class="red highlight">', $error, '</p>';
			}
		} else {		 
			$change_details = change_details($change_email, $change_username, $_POST['change_fullname'], $_POST['bio']);
			header('Location: /u/'.$change_username);
			exit();
		}
    ?>
        <form class="form_sett" action="" method="post">
            <ul>
                <li>
                    <label>Email:</label>
                    <div class="input_box"><input type="text" class="details" name="change_email" size="50" maxlength="255" value="<?php echo $change_email; ?>" /></div>
                </li>
                <li>
                    <label>Username:</label>
                    <div class="input_box"><input type="text" class="details" name="change_username" size="50" maxlength="20" value="<?php echo $change_username; ?>" /></div>
                </li>
                <li>
                    <label>Full Name:</label>
                    <div class="input_box"><input type="text" class="details" name="change_fullname" size="50" maxlength="20" value="<?php echo $change_fullname; ?>" /></div>
                </li>
                <li>
                    <label>Bio:</label>
                    <div class="input_box"><textarea id="bio" name="bio" rows="6" cols="59" maxlength="140"><?php echo $bio; ?></textarea></div> 
                </li>
            </ul>
            <div class="submit_button"><input type="submit" class="button" value="Update Details" /></div>
            <div id="display_count"></div>
        </form>  
    <?php  
    } else {
    ?>
        <form class="form_sett" action="" method="post">
            <ul>
                <li>
                    <label for="change_email">Email:</label>
                    <div class="input_box"><input type="text" class="details" name="change_email" id="change_email" size="50" maxlength="255" value="<?php echo $user_data['email']; ?>" /></div>
                </li>
                <li>
                    <label for="change_username">Username:</label>
                    <div class="input_box"><input type="text" class="details" name="change_username" id="change_username" size="50" maxlength="20" value="<?php echo $user_data['username']; ?>" /></div>
                </li>
                <li>
                    <label for="change_fullname">Full Name:</label>
                    <div class="input_box"><input type="text" class="details" name="change_fullname" id="change_fullname" size="50" maxlength="20" value="<?php echo $user_data['fullname']; ?>" /></div>
                </li>
                <li>
                    <label for="bio">Bio:</label>
                    <div class="input_box"><textarea name="bio" id="bio" rows="6" cols="59" maxlength="140"><?php echo $user_data['bio']; ?></textarea></div>
                </li>
            </ul>
            <div class="submit_button"><input type="submit" class="button" value="Update Details" /></div>
            <div id="display_count"></div>
        </form> 
    <?php
    }
    ?>
</div>

<?php
include '../djajamarsum/template/footer.php';
?>