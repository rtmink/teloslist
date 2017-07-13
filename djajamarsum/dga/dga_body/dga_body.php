<div id="dga_main" class="boxShadow">
    <div class="dga_tab">
        <h3>
            <?php
            foreach ($users as $user) {
                echo '<a href="u/'.$user['username'].'">'.$user['fullname'].'</a>\'s ';  
                if ($dga_type == 'd') {		
                    echo 'Dream';	
                } else if ($dga_type == 'g') {
                    if (acc_goal_check($dga_id) === false) {
                        echo 'Goal';
                    } else {
                        echo 'Accomplished Goal';	
                    }
                } elseif ($dga_type == 'a') {		
                    echo 'Accomplishment';		
                }
            }
            ?>
        </h3>
        <?php
        if (logged_in()) {
            if ($user_id == logged_in()) {	
                if ($dga_type == 'g' && acc_goal_check($dga_id) === false) {
                    include 'acc/acc.php';
                } 
            } else {
                include 'like/like.php';
            }
        }
        ?>
        <div class="clear"></div>
    </div>
    
    <?php
    if (logged_in() && $user_id == logged_in()) {
        $dga_body = 'dga_body_top';
    } else {
        $dga_body = 'dga_body_top2';
    }
    ?>
    
    <div id="<?php echo $dga_body; ?>">
        <?php
        $show_dga_imgs = show_dga_imgs($dga_id, $user_id);
        
        if (empty($show_dga_imgs)) {	
            echo '<h6>'.clickable_link($dga['dga']).'</h6>';
        } else {       
            echo '<p>'.clickable_link($dga['dga']).'</p>';	
            
            foreach ($show_dga_imgs as $show_dga_img) {
                    
                if ($show_dga_img['url'] == '') {
                    //$img_url = 'xxx/uploads/dga_img/org/'.$show_dga_img['name'].'.'.$show_dga_img['ext'];
					$img_url = "xxx/uploads/dga_img/org/{$show_dga_img['name']}.{$show_dga_img['ext']}";
                } else {	
                    $img_url = $show_dga_img['url'];
                }
        ?>
                <h6 id="h6Img">
                    <a href="<?php echo $img_url; ?>" target="_blank">
                        <img src="xxx/uploads/dga_img/rs/<?php echo $show_dga_img['name'].'.'.$show_dga_img['ext']; ?>" />
                    </a>
                </h6>
        <?php			
            }
        }
        ?>
    </div>
    
    <?php
    if (logged_in() && $user_id == logged_in()) {
    ?>	
        <div id="dga_body_bottom">
            <span rel="tooltip" title ="Delete article" class="right" id="trash"></span>
            <div class="clear"></div>
        </div>
    <?php			
    } 
    ?>
</div>