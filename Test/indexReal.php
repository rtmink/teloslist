<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

$page_title = 'Teloslist &bull; Your Lists to Success';
$meta_description = 'Share and keep track of your dreams, goals, and accomplishments.';
$navHP = true;
$https = 'on';

include 'djajamarsum/template/header.php';

if (logged_in()) {
	header('Location: dga');
	exit();
}
?>

<div id="main2">
    <div id="hp_logo"><img src="xxx/img/tl10.png" width="410" height="110"/></div>
    <h2 class="greenL textShadow center">Share and keep track of your goals, dreams, and accomplishments</h2>
</div>

<div id="main3">   
    <div class="left" id="iconMain">
        <a href="dga"><h4>Get Inspired!</h4><span id="dgaHP350"></span></a>
    </div>
    
    <div id="regMain">
    	<form class="form_middleHP" action="signin" method="post">
            <input type="text" class="roundedIpt fancy_input shadowFormHP" name="signin_email" size="49" maxlength="255" placeholder="Email" />
            <p class="left" id="pswd3"><input type="text" class="roundedIpt2 shadowFormHP2" placeholder="Password" onfocus="cI2()" /></p>
            <p class="left" id="pswd4" style="display: none">
            	<input type="password" class="roundedIpt2 shadowFormHP2" name="signin_password" id="sipswd" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="rI2()"/>
            </p>
            <input type="submit" class="button buttonHP" id="stupidIEButtonHP" value="Sign In" />
            <div class="clear"></div>
            <label class="remember" name="rememberMoi">
            	<input type="checkbox" name="rememberMoi" value="oui"/>
            	Remember me
            </label>
            <span class="bull">&bull;</span>            
            <a class="remember" href="forgot_password">Forgot your password?</a>
    	</form>
        <form class="form_middleHP" action="signup" method="post">
            <input type="text" class="roundedIpt fancy_input shadowFormHP" name="signup_email" size="49" maxlength="255" placeholder="Email" />
            <input type="text" class="fancy_input shadowFormHP3" name="signup_username" size="49" maxlength="20" placeholder="Username" />
            <input type="text" class="fancy_input shadowFormHP3" name="signup_fullname" size="49" maxlength="20" placeholder="Full Name" />
            <p class="left" id="pswd1"><input type="text" class="roundedIpt2 shadowFormHP2" placeholder="Password" onfocus="cI()" /></p>
            <p class="left" id="pswd2" style="display: none">
                <input type="password" class="roundedIpt2 shadowFormHP2" name="signup_password" id="supswd" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="rI()" />
            </p>  
            <input type="submit" class="button buttonHP" value="Sign Up" />
        </form>
    </div>
</div>

<?php 
include 'djajamarsum/template/footer.php';
?>