<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && isset ($_POST['goal_id_obj'], $_POST['obj'])) {
	
	$user_id_session = logged_in();
	
	$goal_id_obj = $_POST['goal_id_obj'];
  	$obj = $_POST['obj'];
  
  	$obj = check_values($obj);
	
	if ($obj != '') {
	
		$post_obj = post_obj($goal_id_obj, $obj);	
		
		//----------Showing---Objective-------------------------------------------------------------------
		$obj_infos = $post_obj;
	
		foreach ($obj_infos as $obj_info) {
			
			$dga_types = dga_type($obj_info['dga_id']);
			$dga_type = $dga_types;
			
			$orType = ($dga_type == 'a' || acc_goal_check($obj_info['dga_id']) === true);
			$orType2 = ($dga_type == 'd');
			
			if ($orType2) {
				$class = 'dreamStar';
			} else {
				$class = 'checkbox';
			}
			
			if ($obj_info['checked'] == 'y' || $orType) {
				$checked = ' class="checkmark"';	
			} else {	
				$checked = '';
			}
			
			if (!logged_in() || $user_id_session != logged_in() || $orType || $orType2) {
				$cb = '';	
			} else {
				$cb = ' role="checkbox"';		
			}
		?>
			<li class="objx" id="obj_<?php echo $obj_info['id']; ?>">
				<ul>
					<li>
						<div class="<?php echo $class; ?>" id="cb_<?php echo $obj_info['id']; ?>_<?php echo $obj_info['dga_id']; ?>"<?php echo $cb; ?>>
                        	<div<?php echo $checked; ?>></div>
                        </div>
					</li>
					<li>
						<?php $users = get_users($user_id_session); ?>
						<p><?php echo nl2br(clickable_link($obj_info['obj'])); ?></p>
						<span class="small_info">	
							<?php echo time_posted($obj_info['ts']); ?>
							<a class="delete_obj" id="delete_obj_<?php echo $obj_info['id']; ?>" href="#"><span class="trash right"></span></a>
						</span>
					</li>
				</ul>
			</li>                
		<?php
		}
	
		echo '<script type="text/javascript" src="xxx/js/del_obj.js"></script>';	
	}
		
} else {
	include '../pnf.php';	
}
?>