<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && isset ($_POST['dga_id_com'], $_POST['com'])) {
	
	$user_id_session = logged_in();
	
	$dga_id_com = $_POST['dga_id_com'];
  	$com = $_POST['com'];
  
  	$com = check_values($com);
	
	if ($com != '') {
	
		$post_com = post_com($dga_id_com, $com);	
		
		//--------Showing---Comments---------------------------------------------------------------------------------
		$com_infos = $post_com;
		$users = get_users($user_id_session);
		
		foreach ($com_infos as $com_info) {
		
			echo '<li id="com_'.$com_info['id'].'">';
		
			$imgs = get_profile_imgs(); 
			
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
		}
		
		echo '<div class="left_pointer2"></div>';
		echo '<div class="com_body boxShadow"><p>'.nl2br(clickable_link($com_info['com'])).'</p>';
		
		foreach ($users as $user) {
			echo '<span class="small_info"><a href="u/'.$user['username'].'">'.$user['fullname'].'</a> &bull; ';	
		}
		 
		echo time_posted($com_info['ts']).' <a class="delete_com" id="delete_com_'.$com_info['id'].'" href="#"><span class="right trash"></span></a></span>';
		
		echo '</div>';
		
		echo '</li>';

		echo '<script type="text/javascript" src="xxx/js/del_com.js"></script>';
    }
		
} else {
	include '../pnf.php';	
}
?>