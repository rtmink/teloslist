<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

if (logged_in()) {
	$user_data = user_data('username');
  	header('Location: /u/'.$user_data['username']);
  	exit();
}

if (!isset($_GET['id']) || !isset($_GET['key']) || empty($_GET['id']) || empty($_GET['key']) || key_check($_GET['id'], $_GET['key']) === false) {
  header('Location: forgot_password');
  exit();
}

$page_title = 'Reset Password &bull; Teloslist';
$navHP = true;
$https = 'on';

include 'djajamarsum/template/header.php';

echo '<div id="hp_logo"><img src="xxx/img/tl10.png" width="410" height="110"/></div>';

if (isset($_GET['id']) && isset($_GET['key']) && !empty($_GET['id']) && !empty($_GET['key']) && key_check($_GET['id'], $_GET['key']) === true) {
	$user_id = $_GET['id'];
	$key = $_GET['key'];
	
	$current_time = time();
	$times = time_check($user_id, $key);
	
	foreach ($times as $time) {
		$time_ex = $time['time_ex'];
	}

	if ($current_time > $time_ex) {
		echo '<div class="error_middle"><p class="red highlight">This link is out of date and has expired.</p></div>';
	} else {
	
	$users = get_u_email($user_id, $key);
	foreach ($users as $user) {
		$email = $user['email'];
	}   

	if (isset($_POST['reset_password'])) {
	  $reset_password = $_POST['reset_password'];
	
	  $errors = array();
	
	  if (empty($reset_password)) {
		$errors[] = 'Password required.';
	  } else {
		if (strlen($reset_password) < 6) {
			$errors[] = 'Password must be at least 6 characters.';
		}
		if (strlen($reset_password) > 35) {
			$errors[] = 'Password contains too many characters.';
		}
	  }
	
	  if (!empty($errors)) {
		foreach ($errors as $error) {
		  echo '<div class="error_middle"><p class="red highlight">', $error, '</p></div>';
		}
	  } else { 
		  $reset_password = md5($reset_password);
		  
		  reset_password($user_id, $key, $reset_password);
		  
		  $_SESSION['user_id'] = $user_id;
		  $users = get_users($_SESSION['user_id']);
		  foreach ($users as $user) {
				header('Location: u/'.$user['username']);
				exit();
			}
	  }
	
	}

?>

      <form class="form_middle" action="" method="post">
          <input type="text" class="fancy_input shadowFormHP" size="49" maxlength="35" readonly="readonly" placeholder="Email" value="<?php echo $email; ?>" />
          <p><input type="password" class="roundedIpt4 shadowFormHP2" name="reset_password" size="49" autocomplete="off" placeholder="New Password"/></p>
          <input type="submit" class="button buttonWide" value="Reset my password" />
      </form>

<?php   
	}

}

include 'djajamarsum/template/footer.php';
?>