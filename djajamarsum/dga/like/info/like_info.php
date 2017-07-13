<?php
$get_likes = get_likes($dga_id);
	
foreach ($get_likes as $get_like) {
	
	echo '<p class="dga_infoP">', $get_like['count'], '</p><p>';
	
	if ($get_like['count'] == 1) {
		echo 'like';
	} else {
		echo 'likes';	
	}
	
	echo '</p>';
}	
?>