<?php
$coms = get_com($dga_id);
 
echo '<div id="com_tab"><span id="comIcon"></span><h5>';		
	
if (empty($coms)) {
	
	echo '0 comments';
		
} else {
	
	$n_coms = get_n_com($dga_id);
            
	foreach ($n_coms as $n_com) {
		
		echo $n_com['count'],' ';
		
		if ($n_com['count'] == 1) {
			
			echo 'comment';
			
		} else {
			
			echo 'comments';
				
		}     
	}
}

echo '</h5>';

if (logged_in() && rel_check($user_id, 'iBlocked') === false && rel_check($user_id, 'block') === false) {
?>	
	<div class="dga_hidden2">
		<div id="display_count_com"></div>
        <input type="button" class="buttonR" id="com_button" value="Post" />        
	</div>	
<?php
}

echo '<div class="clear"></div></div>';
?>

