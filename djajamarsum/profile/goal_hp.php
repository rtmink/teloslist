<ul class="dlm">
	<div id="dlmLine">
		<?php 
        $uLink = '/u/'.username($user_id);
        
        function dgaType($type, $title, $uLink, $dgaType) {
            if ($dgaType == $type) {
                $dlmCurrent = 'id="dlmCurrent" ';
            } else {
                $dlmCurrent = '';
            }
            echo '<a '.$dlmCurrent.'href="'.$uLink.'">'.$title.'</a>' ;	
        }	
        ?>
        <li><?php dgaType('all', 'All', $uLink, $dgaType); ?></li>
        <li><?php dgaType('d', 'Dreams', $uLink.'/dreams', $dgaType); ?></li>
        <li><?php dgaType('g', 'Goals', $uLink.'/goals', $dgaType); ?></li>
        <li><?php dgaType('a', 'Accomplishments', $uLink.'/accomplishments', $dgaType); ?></li>
        <li class="dlm_last-child"><?php dgaType('l', 'Likes', $uLink.'/likes', $dgaType); ?></li>
        <div class="clear"></div>
    </div>
</ul>
<?php
$dgaAll = get_dga_uid($user_id, $dgaType);

if (empty($dgaAll)) {
	
	if ($dgaType == 'd') {
		echo '<span class="noDreams"></span>';
	} else if ($dgaType == 'g') {
		echo '<span class="noGoals"></span>';
	} else if ($dgaType == 'a') {
		echo '<span class="noAccs"></span>';
	} else if ($dgaType == 'all') {
		echo '<span class="noAll"></span>';
	} else if ($dgaType == 'l') {
		echo '<span class="noLikes"></span>';
	}
		
} else {
	?>
    <ul class="dga_post" id="dga_float_is">
        <?php
		$start = microtime(true);       
        foreach ($dgaAll as $dgaEach) {
            
            if ($dgaType == 'l') {
                $user_id = $dgaEach['user_id'];	
            }
            $show_dga_imgs = show_dga_imgs($dgaEach['id'], $user_id);
            
            if (empty($show_dga_imgs)) {
                $classes = 'smDGAImg1';
                $image = '';        
            } else {
                
                foreach ($show_dga_imgs as $show_dga_img) {
                    
                    $image_file = 'http://localhost/xxx/uploads/dga_img/sm/'.$show_dga_img['name'].'.'.$show_dga_img['ext'];
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
		echo "Completed in ", microtime(true) - $start, " Seconds\n";
        ?>
    </ul>
	<?php	       
}
?>