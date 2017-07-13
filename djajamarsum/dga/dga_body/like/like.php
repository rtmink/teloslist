<?php
if ($user_id != logged_in() && rel_check($user_id, 'iBlocked') === false && rel_check($user_id, 'block') === false) {
	
	if (like_check($dga_id) === true) {
		$opacity = ' buttonOp clicked';	
	} else {
		$opacity = '';
	}
?>
    
<form>
	<div class="like_hidden">
	<input type="button" class="buttonR<?php echo $opacity; ?>" id="like_button" value="Like" />  
    <input type="hidden" name="dga_id_like" id="dga_id_like" value="<?php echo $dga_id; ?>" />
    </div>
</form>	
        
<?php               
} 
?>
     