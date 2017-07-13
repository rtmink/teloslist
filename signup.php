<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

if (logged_in()) {
	$user_data = user_data('username');
  	header('Location: /u/'.$user_data['username']);
  	exit();
}

$page_title = 'Sign Up &bull; Teloslist';
$navHP = true;
$https = 'on';

include 'djajamarsum/template/header.php';

echo '<div id="hp_logo"><img src="xxx/img/tl10.png" width="410" height="110"/></div>';

if (isset($_POST['signup_email'], $_POST['signup_username'], $_POST['signup_fullname'], $_POST['signup_password'])) {
	$signup_email = check_values2($_POST['signup_email']);
  	$signup_username = check_values2($_POST['signup_username']);
	$signup_fullname = check_values2($_POST['signup_fullname']);
	$signup_password = $_POST['signup_password'];

  	$errors = array();

  	if (empty($signup_email) || empty($signup_username) || empty($signup_fullname) || empty($signup_password)) {
    	$errors[] = 'All fields required!';
  	} else {

		if (filter_var($signup_email, FILTER_VALIDATE_EMAIL) === false) {
		  $errors[] = 'Invalid email address.';
		} 
	
		if (strlen($signup_email) > 255 || strlen($signup_username) > 25 || strlen($signup_fullname) > 20 || strlen($signup_password) > 35) {
		  $errors[] = 'One or more fields contains too many characters.';
		}
	
		if (email_exists($signup_email) === true) {
		  $errors[] = 'Desired email address is already in use.';
		}
		
		if (username_exists($signup_username) === true || block_username($signup_username) === true) {
		  $errors[] = 'Desired username is already in use.';
		}
		
		if (check_alphan($signup_username) == 'bad') {
			$errors[] = 'Invalid Username.';
		}
		
		if (strlen($signup_password) < 6) {
		  $errors[] = 'Password must be at least 6 characters.';
		}

  	}

  	if (!empty($errors)) {
    	foreach ($errors as $error) {
      		echo '<div class="error_middle"><p class="red highlight" >', $error, '</p></div>';
    	}
  	} else {
    	$signup = user_signup($signup_email, $signup_username, $_POST['signup_fullname'], $signup_password);
    	$_SESSION['user_id'] = $signup;
		$users = get_users($_SESSION['user_id']);
	
		if (isset($_GET['gt']) && !empty($_GET['gt'])) {
			header('Location: '.check_values2($_GET['gt']));
			exit();
		} else {
			foreach ($users as $user) {
				header('Location: u/'.$user['username']);
				exit();
			}
    	}
	}
?>

	<form class="form_middle" action="" method="post">
    	<input type="text" class="roundedIpt fancy_input shadowFormHP" name="signup_email" size="49" maxlength="255" placeholder="Email" value="<?php echo $signup_email; ?>" />
        <input type="text" class="fancy_input shadowFormHP3" name="signup_username" size="49" maxlength="20" placeholder="Username" value="<?php echo $signup_username; ?>" />
        <input type="text" class="fancy_input shadowFormHP3" name="signup_fullname" size="49" maxlength="20" placeholder="Full Name" value="<?php echo $signup_fullname; ?>" />
        <p id="pswd5"><input type="text" class="roundedIpt3 shadowFormHP2" placeholder="Password" onfocus="pswdCh('pswd5', 'pswd6', 'supswd2')" /></p>
    	<p id="pswd6" style="display: none">
        	<input type="password" class="roundedIpt3 shadowFormHP2" name="signup_password" id="supswd2" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="pswdBn('pswd5', 'pswd6', supswd2)" />
        </p>
        <input type="submit" class="button buttonWide" value="Sign Up" />
  	</form>

<?php   
} else {
?>

    <form class="form_middle" action="" method="post">
        <input type="text" class="roundedIpt fancy_input shadowFormHP" name="signup_email" size="49" maxlength="255" placeholder="Email" />
        <input type="text" class="fancy_input shadowFormHP3" name="signup_username" size="49" maxlength="20" placeholder="Username" />
        <input type="text" class="fancy_input shadowFormHP3" name="signup_fullname" size="49" maxlength="20" placeholder="Full Name" />
        <p id="pswd5"><input type="text" class="roundedIpt3 shadowFormHP2" placeholder="Password" onfocus="pswdCh('pswd5', 'pswd6', 'supswd2')" /></p>
        <p id="pswd6" style="display: none">
        	<input type="password" class="roundedIpt3 shadowFormHP2" name="signup_password" id="supswd2" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="pswdBn('pswd5', 'pswd6', supswd2)" />
        </p>  
        <input type="submit" class="button buttonWide" value="Sign Up" />
    </form>

<?php
}
include 'djajamarsum/template/footer.php';
?>