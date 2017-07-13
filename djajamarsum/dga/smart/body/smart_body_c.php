<?php
$sec = ' buttonOp clicked';

function smart_button($smart_button_type, $sec) {
	
	if (smart_check($dga_id, $smart_button_type, 'y') !== false) {
		echo $sec;
	}
	if (smart_check($dga_id, $smart_button_type, 'n') !== false) {
		echo $sec;
	}
	
	echo '
		<div>
        	<input type="button" class="button smart_button'.$sec.'" id="'.$smart_button_type.'_y" value="Yes" />    
        	<input type="button" class="button smart_button'.$sec.'" id="'.$smart_button_type.'_n" value="No" />    
    	</div>
	';	
}
?>

<form id="smart_form">
	<input type="hidden" name="smart_dga_id" id="smart_dga_id" value="<?php echo $dga_id;?>" />
    <?php
    	smart_button('s', $sec);
		smart_button('m', $sec);
		smart_button('a', $sec);
		smart_button('r', $sec);
		smart_button('t', $sec);
	?>
</form> 