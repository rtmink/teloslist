<!--
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
-->

CSS

/* Homepage Logo */
#hp_logo {width: 410px;margin: 0 auto;margin-bottom: 10px;}
#hp_slogan {width: 808px;margin: 10px auto;}

/* Forms, error */
.form_middle, .error_middle {width: 333px;margin: 0 auto;}

.form_middleHP {width: 273px;float: right;margin-bottom: 20px;}
.form_middleHP input[type=text], .form_middleHP input[type=password] {font-size: 0.9em;width: 251px;padding: 7px;border-color: #ccc;}

.shadowFormHP {-moz-box-shadow: inset 0 2px 2px #eee !important;-webkit-box-shadow: inset 0 2px 2px #eee !important;box-shadow: inset 0 2px 2px #eee !important;}
.shadowFormHP2 {-moz-box-shadow: inset 0 -2px 2px #eee !important;-webkit-box-shadow: inset 0 -2px 2px #eee !important;box-shadow: inset 0 -2px 2px #eee !important;}
.shadowFormHP3 {-moz-box-shadow: inset 0 -1px -1px #eee !important;-webkit-box-shadow: inset 0 -1px -1px #eee !important;box-shadow: inset 0 -1px -1px #eee !important;}
.form_middleHP input[type=text]:focus, .form_middleHP input[type=password]:focus {border-color: #ccc}
.form_middleHP .roundedIpt {border-radius: 10px 10px 0 0;-webkit-border-radius: 10px 10px 0 0;-moz-border-radius: 10px 10px 0 0;}
.form_middleHP input.roundedIpt2 {width: 181px;border-right: 0;border-bottom-left-radius:10px;-moz-border-radius-bottomleft: 10px;-webkit-border-bottom-left-radius: 10px;}
.form_middleHP .buttonHP {float: left;width: 71px;height: 31px;margin: 0;border-left: 0;border-radius: 0 0 10px 0;-webkit-border-radius: 0 0 10px 0;-moz-border-radius: 0 0 10px 0;}
.form_middleHP .fancy_input:focus {border-bottom: none}
.form_sett label {display: inline-block;float: left;width: 250px;vertical-align: top;padding-top: 10px;font-size: 21px;color: #7C7268;text-shadow: 0 1px 0 white;}

.remember, .remForPswd {display: inline-block;vertical-align: top;}
.remember, .forgotPswd, .bull {font-size: .8em;line-height: 13px;color: #595959;text-shadow: 0 1px 0 white;}
.remForPswd {line-height: 13px;text-shadow: 0 1px 0 white;}
.bull {vertical-align: top;margin: 0 3px;}
