<ul id="com_box">        
<?php
// Comment - <$coms = get_com($dga_id)> - in comment_header.php  
        
if (empty($coms)) {
        
} else {		
	foreach ($coms as $com) {
	
		$user_id_com = $com['user_id'];
			
		echo '<li id="com_'.$com['id'].'">';
		
		// Profile Image
		$users = get_users($user_id_com);
		$imgs = show_profile_imgs($user_id_com); 
		
		foreach ($users as $user) {
		
			echo '<a href="u/'.$user['username'].'">';
		
			if (empty($imgs)) {
		
				echo '<img class="com_p_img" src="xxx/img/prof3.gif" />';
		
			} else {
				foreach ($imgs as $img) {
					echo '<img class="com_p_img" src="xxx/uploads/p_img/com/'.$img['name'].'.'.$img['ext'].'" alt="" />'; 
				}
			}
		  
			echo '</a>';
		  
		}
		
		echo '<div class="left_pointer2"></div>';    
		echo '<div class="com_body boxShadow"><p>'.nl2br(clickable_link($com['com'])).'</p>';
				
		foreach ($users as $user) {
			echo '<span class="small_info"><a href="u/'.$user['username'].'">'.$user['fullname'].'</a> &bull; ';
		}	
				
		include 'footer/com_footer.php';
		
		echo '</span>';
		
		echo '</div>';
		
		echo '</li>';
    }
}
?>       
</ul>