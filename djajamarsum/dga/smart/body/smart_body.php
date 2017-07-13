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
    <div>
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 's', 'y') !== false) {echo $sec;} ?>" id="s_y" value="Yes" />    
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 's', 'n') !== false) {echo $sec;} ?>" id="s_n" value="No" />    
    </div>
    <div>
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 'm', 'y') !== false) {echo $sec;} ?>" id="m_y" value="Yes" />    
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 'm', 'n') !== false) {echo $sec;} ?>" id="m_n" value="No" />    
    </div>
    <div>
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 'a', 'y') !== false) {echo $sec;} ?>" id="a_y" value="Yes" />
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 'a', 'n') !== false) {echo $sec;} ?>" id="a_n" value="No" />
    </div>
    <div>
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 'r', 'y') !== false) {echo $sec;} ?>" id="r_y" value="Yes" />
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 'r', 'n') !== false) {echo $sec;} ?>" id="r_n" value="No" />
    </div>
    <div>
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 't', 'y') !== false) {echo $sec;} ?>" id="t_y" value="Yes" />
        <input type="button" class="button smart_button<?php if (smart_check($dga_id, 't', 'n') !== false) {echo $sec;} ?>" id="t_n" value="No" />
    </div>
</form> 