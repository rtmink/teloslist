<ul id="obj_box" >        
<?php
// Objective
$objs = get_obj($dga_id);
        
if (empty($objs)) {
	    
} else {		
	foreach ($objs as $obj) {
	
		$user_id_obj = $obj['user_id'];
		$orType = ($dga_type == 'a' || acc_goal_check($dga_id) === true);
		$orType2 = $dga_type == 'd';
		
		if ($orType2) {
			$class = 'dreamStar';
		} else {
			$class = 'checkbox';
		}
		
		if ($obj['checked'] == 'y' || $orType) {
			$checked = ' class="checkmark"';	
		} else {	
			$checked = '';
		}
		
		if (!logged_in() || $user_id != logged_in() || $orType || $orType2) {
			$cb = '';	
		} else {
			$cb = ' role="checkbox"';		
		}
?>
        <li class="objx" id="obj_<?php echo $obj['id']; ?>">
            <ul>
                <li>
                    <div class="<?php echo $class; ?>" id="cb_<?php echo $obj['id']; ?>_<?php echo $dga_id; ?>"<?php echo $cb; ?>>
                    	<div<?php echo $checked; ?>></div>
                    </div>            
                </li>
                <li>
                    <p><?php echo nl2br(clickable_link($obj['obj'])); ?></p>
                    <?php $users = get_users($user_id_obj); ?>		
                    <span class="small_info"><?php include 'footer/obj_footer.php'; ?></span>
                </li>
            </ul>
        </li>
<?php
    }
}    
?>  
</ul>