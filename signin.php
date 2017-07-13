<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

if (logged_in()) {
	$user_data = user_data('username');
  	header('Location: /u/'.$user_data['username']);
  	exit();
}

$page_title = 'Sign In &bull; Teloslist';
$navHP = true;
$https = 'on';

include 'djajamarsum/template/header.php';

echo '<div id="hp_logo"><img src="xxx/img/tl10.png" width="410" height="110"/></div>';

if (isset($_POST['signin_email'], $_POST['signin_password'])) {
	$signin_email = $_POST['signin_email'];
  	$signin_password = $_POST['signin_password'];
	if (isset($_POST['rememberMoi'])) {
		$rememberMoi = $_POST['rememberMoi'];	
	} else {
		$rememberMoi = "non";
	}
	
  	$errors = array();

  	if (empty($signin_email) || empty($signin_password)) {
    	$errors[] = 'Email and password required.';
  	} else {

    	$signin = signin_check($signin_email, $signin_password);
    
    	if ($signin === false) {
      		$errors[] = 'Email or password is incorrect.';
    	}
  	}

  	if (!empty($errors)) {
    	foreach ($errors as $error) {
      		echo '<div class="error_middle"><p class="red highlight">', $error, '</p></div>';
    	}
	} else {
		
		if ($rememberMoi == 'oui') {
			
			$handsomeBoy = md5($signin.'jamesisTHEbest'.time().'ryantisfuckinghandsome'.time().'EverardoisG4y');
			setcookie("handsomeBoy",$handsomeBoy,time()+7884000);
			
			store_cookies($handsomeBoy, $signin);
			
			$_COOKIE['handsomeBoy'] = $handsomeBoy;
			$users = get_users($signin);
		} else {
			$users = get_users($_SESSION['user_id'] = $signin);			
		}
		
		updateIP($signin);
		
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
}
?>

<form class="form_middle" action="" method="post">
	<input type="text" class="roundedIpt fancy_input shadowFormHP" name="signin_email" size="49" maxlength="255" placeholder="Email" />
	<p id="pswd7"><input type="text" class="roundedIpt3 shadowFormHP2" placeholder="Password" onfocus="pswdCh('pswd7', 'pswd8', sipswd2)" /></p>
    <p id="pswd8" style="display: none"><input type="password" class="roundedIpt3 shadowFormHP2" name="signin_password" id="sipswd2" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="pswdBn('pswd7', 'pswd8', 'sipswd2')"/></p>
    <input type="submit" class="button buttonWide" value="Sign In" />
    <div style="margin-top: 18px">
        <label class="rememberBg">
            <input type="checkbox" name="rememberMoi" value="oui"/>
            Remember me
        </label>
        <span class="bullBg">&bull;</span>
        <a class="rememberBg" href="forgot_password">Forgot your password?</a>
    </div>
</form>

<?php
include 'djajamarsum/template/footer.php';
?>