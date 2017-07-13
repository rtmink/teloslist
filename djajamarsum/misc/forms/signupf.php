<div class="sharePt1"><h1>Sign Up</h1><span class="shareClose"></span></div>
<div class="sharePt2">
	<div class="sharePt2x">
    	<button class="facebook button buttonSocial"><span class="fb"></span><i>Facebook</i></button>
        <button class="twitter button buttonSocial"><span class="tw"></span><i>Twittter</i></button>
    </div>
	<div class="sharePt2y">
        <form class="form_middleHP" action="signup" method="post">
            <input type="text" class="roundedIpt fancy_input shadowFormHP" name="signup_email" size="49" maxlength="255" placeholder="Email" />
            <input type="text" class="fancy_input shadowFormHP3" name="signup_username" size="49" maxlength="20" placeholder="Username" />
            <input type="text" class="fancy_input shadowFormHP3" name="signup_fullname" size="49" maxlength="20" placeholder="Full Name" />
            <p class="left" id="pswd1">
                <input type="text" class="roundedIpt3 shadowFormHP2" size="49" placeholder="Password" onfocus="pswdCh('pswd1', 'pswd2', 'supswd')" />
            </p>
            <p class="left" id="pswd2" style="display: none">
                <input type="password" class="roundedIpt3 shadowFormHP2" name="signup_password" id="supswd" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="pswdBn('pswd1', 'pswd2', 'supswd')" />
            </p>  
            <input type="submit" class="button buttonWide" value="Sign Up" />
        </form>
    </div>
</div>