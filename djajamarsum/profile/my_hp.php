<div class="profo">

    <div class="profo1">
        <div class="profo1_border">
        	<a href="/settings/upload_profile_img">
			<?php
			$imgs = get_profile_imgs();
			
            echo '<img src="http://localhost/xxx/';
            
            if (empty($imgs)) {
                echo 'img/prof.gif" title="Upload a profile picture" />';
            } else {
                foreach ($imgs as $img) {
                    echo 'uploads/p_img/pro/'.$img['name'].'.'.$img['ext'].'" alt="" />'; 
                }
            }
            ?>    
    		</a>      
    	</div>      
    </div>

    <div class="profo2">
        <?php
        if (isset($_GET['re']) && !empty($_GET['re'])) {
        
            echo '<a href="/u/'.$user_data['username'].'">';
            echo '<h2>'.$user_data['fullname'].'</h2>';
            echo '</a>';
        
        } else {   	
            echo '<h2>'.$user_data['fullname'].'</h2>';   
        }
        ?> 
        <div>
            <p>
            <?php
            if (empty($user_data['bio'])) {	
                echo '<a class="greenL" href="/settings/update_details">Start writing your bio.</a>';	
            } else {
                echo clickable_link($user_data['bio']);
            }
            ?>
            </p>
        </div>    
    </div>

    <div class="profo3">
        <div class="rel_hidden">
            <a href="/settings/update_details">
            <input type="button" class="button" value="Edit Profile" />
            </a>
        </div>
		<?php include 'support/info.php'; ?>
	</div>

	<div class="clear"></div>
    
</div>