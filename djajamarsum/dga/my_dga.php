<?php
$users = get_users($user_id);
$imgs = show_profile_imgs($user_id);
?>

<div class="dgaL">
	<?php
    foreach ($users as $user) {
        
        echo '<a href="u/'.$user['username'].'">';
        
        // Profile Image
        if (empty($imgs)) {
            echo '<img src="xxx/img/prof.gif" />';
        } else {
            foreach ($imgs as $img) {
                echo '<img src="xxx/uploads/p_img/pro/', $img['name'], '.', $img['ext'], '" alt="" />'; 
            }
        }
        
        echo '</a>';
    }
    ?>
    <div class="dga_info boxShadow">
		<?php
        include 'counter/counter.php';
        include 'like/info/like_info.php';
        include 'ts/ts.php';
        ?>
    </div>
    <div class="dga_info boxShadow"><?php include 'share/share.php'; ?></div>
</div>

<div class="dgaM">
    <div class="left_pointer2"></div>
    <?php
    include 'dga_body/dga_body.php';
    include 'smart/smart.php';	
    include 'com/com.php'; 
    ?>
</div>

<div class="dgaR"><?php include 'obj/obj.php'; ?></div>
<div class="clear"></div>
<input type="hidden" name="delete_dga" id="delete_dga" value="<?php echo $dga['id']; ?>" /></input>

<script type="text/javascript">$('#trash').click(function() {var answer = confirm("Are you sure you want to delete this?"); var delete_dga = $('#delete_dga').val(); if (answer){window.location = "dlt/dlt_dga.php?id="+delete_dga;}else{}return false;});</script>