<div class="profo">

	<div class="profo1">
		<div class="profo1_border">
		<?php
		function profPicHP($user_id) {
			// Profile Image
			$imgs = show_profile_imgs($user_id);
			
			echo '<img src="http://localhost/xxx/';
			
			if (empty($imgs)) {
				echo 'img/prof.gif" />';
			} else {
				foreach ($imgs as $img) {
					echo 'uploads/p_img/pro/'.$img['name'].'.'.$img['ext'].'" alt="" />'; 
				}
			}
		}
		
		if (isset($_GET['re']) && !empty($_GET['re'])) {
			echo '<a href="/u/'.$user['username'].'">', profPicHP($user_id),'</a>';       
		} else {
			profPicHP($user_id);
		}
		?>
    </div>
</div>

<div class="profo2">
<?php
foreach ($users as $user) {
	
	if (isset($_GET['re']) && !empty($_GET['re'])) {
		echo '<a href="/u/'.$user['username'].'">'; 		
		echo '<h2>'.$user['fullname'].'</h2>';
		echo '</a>';	
	} else {
		echo '<h2>'.$user['fullname'].'</h2>';
	}
	
	if (!empty($user['bio'])) {	
		echo '<p>'.clickable_link($user['bio']).'</p>';
	}
}
?>
</div>

<div class="profo3">
<?php 
if (logged_in()) {

	echo '<div class="rel_hidden">';

	if (rel_check($user_id, 'uB') === false) {
		
		if (rel_check($user_id, 'block') === true) {
	
			echo '<input type="button" class="supBtn button" id="rel_button" value="Unblock"/>';
			
		} else if (rel_check($user_id, 'iBlocked') === true) {
			
		} else {
		
			echo '<input type="button" class="supBtn button" id="rel_button" value="Support"/>';
		
		}
		
	} else if (rel_check($user_id, 'uB') === true) {
		
		echo '<input type="button" class="supBtn button" id="rel_button" value="Supporting" />';
		
	} 
	
	echo '</div>';
	echo '<input type="hidden" name="user_id_rel" id="user_id_rel" value="'.$user_id.'" />';
	
}

echo '<div class="clear"></div>';

include 'support/info.php'; 
?>
</div>

<div class="clear"></div>
</div>
<div class="clear"></div>