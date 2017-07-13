<?php
	$supInfoPath = '<p><a class="greenL" href="/u/'.$user['username'];
	
	$count_rels = count_rel($user_id, 'aU');
	foreach ($count_rels as $count_rel) {
		
		echo $supInfoPath.'/supporting">', $count_rel['count'], ' Supporting</a></p>';
				
	}
	
	$count_rels = count_rel($user_id, 'bU');
	foreach ($count_rels as $count_rel) {
	
		echo $supInfoPath.'/supporters">'.$count_rel['count'].' ';
		
		if ($count_rel['count'] == 1) {		
	
    		echo 'Supporter';
		} else {
			echo 'Supporters';
		}
		
		echo '</a></p>';
	}
	
	if (logged_in() && $user_id == logged_in() && isset($_GET['re']) && ($_GET['re'] == 'supporting' 
			|| $_GET['re'] == 'supporters')) {
		echo $supInfoPath.'/block">Block List</a></p>';	
	}
?>
<div class="clear"></div>