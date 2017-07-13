<div class="sharePt1"><h1>Sign In</h1><span class="shareClose"></span></div>
<div class="sharePt2">
	<div class="sharePt2x">
    	<button class="facebook button buttonSocial"><span class="fb"></span><i>Facebook</i></button>
        <button class="twitter button buttonSocial"><span class="tw"></span><i>Twittter</i></button>
    </div>
	<div class="sharePt2y">
        <form class="form_middleHP" action="signin" method="post">
            <input type="text" class="roundedIpt fancy_input shadowFormHP" name="signin_email" size="49" maxlength="255" placeholder="Email" />
            <p class="left" id="pswd3">
            	<input type="text" class="roundedIpt3 shadowFormHP2" size="49" placeholder="Password" onfocus="pswdCh('pswd3', 'pswd4', 'sipswd')" />
            </p>
            <p class="left" id="pswd4" style="display: none">
                <input type="password" class="roundedIpt3 shadowFormHP2" name="signin_password" id="sipswd" size="49" maxlength="35" autocomplete="off" placeholder="Password" onBlur="pswdBn('pswd3', 'pswd4', 'sipswd')"/>
            </p>
            <input type="submit" class="button buttonWide" id="stupidIEButtonHP" value="Sign In" />
            <div class="clear"></div>
            <div style="margin-top: 10px">
                <label class="rememberSm" name="rememberMoi">
                    <input type="checkbox" name="rememberMoi" value="oui"/>
                    Remember me
                </label>    
                <span class="bullSm">&bull;</span>            
                <a class="rememberSm" href="forgot_password">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>