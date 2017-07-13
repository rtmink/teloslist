<?php
$get_n_svalues = get_smart_tvn($dga_id, $barType, 'y');

echo '<span class="left">', $get_n_svalues, '</span>';

$get_n_nsvalues = get_smart_tvn($dga_id, $barType, 'n');

echo '<span class="right">', $get_n_nsvalues, '</span>';
?>
