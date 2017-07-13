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

<div id="mainList">
    <ul class="boxShadow">
    	<li>
        	<div id="mainList_header">
            	<div id="hp_logo"><img src="xxx/img/tl10.png" width="410" height="110"/></div>
            </div>
        </li>
    	<li>
            <div class="mainList_side">
                <div class="mainList_checkbox">
                    <div></div>
                </div>
            </div>
            <div class="mainList_content">
            	<h2 class="greenL">Share and keep track of your goals, dreams, and accomplishments</h2>
            </div>
        </li>
        <li>
            <div class="mainList_side">
                <div class="mainList_checkbox">
                    <div></div>
                </div>
            </div>
            <div class="mainList_content">
            	<div style="display: table;margin: 0 auto;">
                    <button id="signinButton">Sign In</button>
                    <button id="signupButton">Sign Up</button>
                </div>
            </div>
        </li>
        <li>
            <div class="mainList_side">
                <div class="mainList_checkbox">
                    <div></div>
                </div>
            </div>
            <div class="mainList_content">
            	<a href="dga"><h2>Get Inspired!</h2></a>
            </div>
        </li>
        <li>
            <div class="mainList_side">
                <div class="mainList_checkbox">
                    <div></div>
                </div>
            </div>
            <div class="mainList_content">
            	<a href="about/smart"><h2>Learn about S.M.A.R.T. goal</h2></a>
            </div>
        </li>
    </ul>
</div>

<?php 
include 'djajamarsum/template/footer.php';
?>