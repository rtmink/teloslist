<?php
function dlmDGA($type, $name, $dgaType) {
	if ($type == 'all') {
		$ext = '';		
	} else {
		$ext = '?as='.$type;	
	}
	if ($dgaType == $type) {
		echo '<a id="dlmCurrent" href="dga'.$ext.'">'.$name.'</a>';
	} else {
		echo '<a href="dga'.$ext.'">'.$name.'</a>';
	}
}
?>
<ul class="dlm">
	<div id="dlmLine">
        <li><?php dlmDGA('all', 'All', $dgaType); ?></li>
        <li><?php dlmDGA('d', 'Dreams', $dgaType); ?></li>
        <li><?php dlmDGA('g', 'Goals', $dgaType); ?></li>
        <li class="dlm_last-child"><?php dlmDGA('a', 'Accomplishments', $dgaType); ?></li>
        <div class="clear"></div>
    </div> 
</ul>
<?php
$dgaAll = get_dga($dgaType);

if (empty($dgaAll)) {
    
} else {  
	?>
    <ul class="dga_post" id="dga_hp">
		<?php
        foreach ($dgaAll as $dgaEach) {   
            $show_dga_imgs = show_dga_imgs($dgaEach['id'], $dgaEach['user_id']);
           
            if (empty($show_dga_imgs)) {
                $classes = 'smDGAImg1';
                $image = '';       
            } else {
                foreach ($show_dga_imgs as $show_dga_img) {		
                    $image_file = 'xxx/uploads/dga_img/sm/'.$show_dga_img['name'].'.'.$show_dga_img['ext'];
                    $image = '<span><img src="'.$image_file.'" /></span>';
                    
                    if ($show_dga_img['width'] < 222) {
                        $classes = 'smDGAImg2';                    
                    } else {
                        $classes = 'smDGAImg3';
                    }				
                }									
            }
            $classes .= ' dgaLifted dgaDropShadow';
            ?>  
            <li class="<?php echo $classes; ?>" id="idx_<?php echo $dgaEach['id']; ?>">
                <a href="/<?php echo $dgaEach['type']; ?>?x=<?php echo $dgaEach['id']; ?>">	
                    <p><?php echo $dgaEach['dga']; ?></p>  
                    <?php echo $image; ?>
                </a>
            </li>
            <?php
        }	        
        ?>	    
    </ul>
    <?php
}
?>