<?php
$barValue = 'y';
$get_types = get_smart($dga_id, $barType);
				
foreach ($get_types as $get_type) {
			
	$get_values = get_smart_tvn($dga_id, $barType, $barValue);
			
		if ($get_type['count'] == 0) {
			$percentage = 0;
			$neg_percentage = 0;
		} else {
			$percentage = ($get_values / $get_type['count']) * 100;
			$neg_percentage = 100 - $percentage;
		}
		echo '<input type="hidden" id="neg_pctg', $barType,'" value="', $neg_percentage,'" />'; 
		echo '<input type="hidden" id="pctg', $barType,'" value="', $percentage,'" />';	
}
?>

<script type="text/javascript">
  $(document).ready(function() { 
	var b_pctg = $('#pctg<?php echo $barType;?>').val();
	var neg_b_pctg = $('#neg_pctg<?php echo $barType;?>').val();
  	
	if (b_pctg != 0) {
		$('#bar<?php echo $barType;?>').css('background-color', '#FF2400');
		$('#bar<?php echo $barType;?>2').css('width', b_pctg + '%').css('background-color', '#4DBA36');			
	} else if (b_pctg == 0 && neg_b_pctg != 0) {
		$('#bar<?php echo $barType;?>2').css('width', neg_b_pctg + '%').css('background-color', '#FF2400');
	}
  });
</script>
