<?php
if (!logged_in()) {
?>
    <div class="menu">
        <ul>
        	<?php 
			if (!isset($navTour)) {
			?>
                <li id="aboutMenu">
                	<a <?php if (isset($navHP)) {echo 'style="color: white"';}?> id="aboutMenuA" href="#">About<span <?php if (isset($navECT)) {echo 'id="downECT"';}?>></span></a>
                    <ul>
                        <li><a href="/about/smart">S.M.A.R.T.</a></li>
                        <li><a href="/about/us">About Us</a></li>
                        <li><a href="/about/contact">Contact</a></li>
                        <li class="menuLine"><a href="/about/terms">Terms of Service</a></li>
                        <li><a href="/about/privacy">Privacy Policy</a></li>
                    </ul>
                </li>            
            <?php
			}
            if (!isset($navHP) && !isset($navECT) && !isset($navTour) && !isset($navSmart) && !isset($navPro)) {
            ?>
                <li><a href="/signin">Sign In</a></li>
                <li><a href="/signup">Sign Up</a></li>
            <?php
            }
            ?>
        </ul>
    </div>

<?php
} else {
	
$user_data = user_data('fullname', 'username');
$first_name = explode(' ',$user_data['fullname']);
?>
<div class="menu">
<ul>
    <li id="nameMenu"><a id="nameMenuA" href="#"><?php echo $first_name[0];?><span <?php if (isset($navECT)) {echo 'id="downECT"';}?>></span></a>
        <ul style="width: 106px">
            <li><a href="/<?php echo 'u/', $user_data['username'];?>">View Profile</a></li>
            <li><a href="/settings/update_details">Settings</a></li>
            <li><a href="/signout">Sign Out</a></li>
        </ul>
    </li>
    
    <?php
    if (!isset($navHP) && !isset($navECT) && !isset($navTour) && !isset($navSmart)) {
    ?>
    	<li><a id="shareNavBtn" href="#">Share</a></li>   
    <?php
    }
    ?>
    <li id="aboutMenu"><a id="aboutMenuA" href="#">About<span <?php if (isset($navECT)) {echo 'id="downECT"';}?>></span></a>
        <ul>
            <li><a href="/about/smart">S.M.A.R.T.</a></li>
            <li><a href="/about/us">About Us</a></li>
            <li><a href="/about/contact">Contact</a></li>
            <li class="menuLine"><a href="/about/terms">Terms of Service</a></li>
            <li><a href="/about/privacy">Privacy Policy</a></li>
        </ul>
    </li>
</ul>
</div>
<?php
}
?>