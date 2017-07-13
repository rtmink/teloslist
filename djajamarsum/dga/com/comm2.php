<div id="com_main" class="boxShadow">
	<?php 
    include 'header/com_header.php'; 
    $encoded_gt_url = urlencode(curPgURL());
    ?>
    
    <div id="com_textarea" >
        <a class="blue" href="signin?gt=<?php echo $encoded_gt_url;?>">Sign In</a> or <a class="blue" href="signup?gt=<?php echo $encoded_gt_url;?>">Sign Up for Free</a> to comment.
    </div>
</div>        
<?php include 'extras/com_body.php'; ?>

