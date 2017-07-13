<?php
$counter_ns = get_ns_counter($dga_id);

foreach ($counter_ns as $counter_n) {
	
	echo '<p class="dga_infoP">', $counter_n['count'], '</p><p>';
	
	if ($counter_n['count'] == 1) {
		echo 'member view';	
	} else {
		echo 'member views';	
	}
	
	echo '</span></p>';
}
?>
