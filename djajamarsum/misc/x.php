<?php
if (logged_in()) {
?> 
    <div id="x"><?php include 'forms/xf.php'; ?></div>
    <div id="chooseDGA"></div>
    <div class="shareForm" id="shareFormD"><?php include 'forms/df.php'; ?></div>
    <div class="shareForm" id="shareFormG"><?php include 'forms/gf.php'; ?></div>
    <div class="shareForm" id="shareFormA"><?php include 'forms/af.php'; ?></div>
    <?php 
    include 'forms/datef.php'; 
    include 'forms/smartf.php';
    ?>
<?php
} else {
?>
	<div class="hpForm" id="hpFormIn"><?php include 'forms/signinf.php'; ?></div>
    <div class="hpForm" id="hpFormUp"><?php include 'forms/signupf.php'; ?></div>
<?php
}
?>

<div class="overlayEffect" id="overlayEffect1"></div>
<div class="overlayEffect" id="overlayEffect2"></div>