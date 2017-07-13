<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

if (logged_in()) {
	$user_data = user_data('username');
  	header('Location: /u/'.$user_data['username']);
  	exit();
}

$page_title = 'Forgot Password &bull; Teloslist';
$navHP = true;
$https = 'on';

include 'djajamarsum/template/header.php';

echo '<div id="hp_logo"><img src="xxx/img/tl10.png" width="410" height="110"/></div>';

if (isset($_POST['forgot_email'])) {
  $forgot_email = $_POST['forgot_email'];
  
  $errors = array();

  if (empty($forgot_email)) {
    $errors[] = 'Email required!';
  } else {

    $email_check = email_check($forgot_email);
    
    if ($email_check === false) {
      $errors[] = 'Email is not registered.';
    }

  }

  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo '<div class="error_middle"><p class="red highlight">', $error, '</p></div>';
    }
?>
	
	<form class="form_middle" action="" method="post">
 		<p><input type="text" class="roundedIpt4" name="forgot_email" size="49" placeholder="Email" value="<?php echo $_POST['forgot_email']; ?>" /></p>
    	<input type="submit" class="button buttonWide" value="Reset My Password" />
	</form>
    
<?php	
  } else {
	  	$users = user_email($forgot_email);
		
		foreach ($users as $user) {
			$user_id = $user['user_id'];
		}
		
		$time = time();
		$time_ex = time() + (15 * 60);
	  
	  	$key = md5($user_id.$time_ex.$forgot_email.$time);
		$user_key = user_key($forgot_email, $key, $time_ex);

		$to = $forgot_email;
		$subject = 'Teloslist - Reset Password';
		$message = 'Please click the link below to reset your password.<br/>
					<a href="https://www.teloslist.com/reset_password.php?id='.$user_id.'&key='.$key.'">https://www.teloslist.com/reset_password.php?id='.$user_id.'&key='.$key.
					'</a><br /><br />If you don\'t want to reset your password, ignore this email.<br /><br />Thank you,<br />Teloslist';
		$headers = array(
			'From: Teloslist <no-reply@teloslist.com>',
			'Content-Type: text/html'
		);
		
		if (mail($to, $subject, $message, implode("\r\n", $headers))) {
			echo '<div class="error_middle"><p class="green highlight">We\'ve sent you an email with a link to reset your password.</p>
					<p class="green highlight">Make sure it doesn\'t go to your junk mail box.</p></div>';
		} else {
			echo '<div class="error_middle"><p class="red highlight">Unfortunately, we couldn\'t send you an email.</p></div>';
		}

  }

} else {

?>

  <form class="form_middle" action="" method="post">
 	  <p><input type="text" class="roundedIpt4" name="forgot_email" size="49" placeholder="Email" /></p>
      <input type="submit" class="button buttonWide" value="Reset My Password" />
  </form>

<?php  
}
include 'djajamarsum/template/footer.php';
?>