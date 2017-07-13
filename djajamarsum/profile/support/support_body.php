<ul class="dlm">
	<div id="dlmLine">
		<?php 
        $uLink = '/u/'.username($user_id);
        function relType($type, $title, $uLink, $relType) {
            if ($relType == $type) {
                $dlmCurrent = 'id="dlmCurrent" ';
            } else {
                $dlmCurrent = '';
            }
            echo '<a '.$dlmCurrent.'href="'.$uLink.'">'.$title.'</a>';
        }
        ?>
        <li><?php relType('supporting', 'Supporting', $uLink.'/supporting', $relType); ?></li>
        <li <?php if ($relType != 'block') {echo 'class="dlm_last-child"';} ?>><?php relType('supporters', 'Supporters', $uLink.'/supporters', $relType); ?></li>
        <?php 
        if ($relType == 'block') {
            $dlmCurrent = 'id="dlmCurrent" ';
            ?>
            <li class="dlm_last-child">
                <a <?php echo $dlmCurrent; ?>href="<?php echo $uLink; ?>/block">Block List</a>		
            </li>
            <?php
        }
        ?>
        <div class="clear"></div>
    </div>
</ul>
<input type="hidden" name="myIdRel" id="myIdRel" value="<?php echo logged_in(); ?>" />
<input type="hidden" name="pgIdRel" id="pgIdRel" value="<?php echo $user_id; ?>" />
<input type="hidden" name="relType" id="relType" value="<?php echo $relType; ?>" />
<?php
    if ($relType == 'supporting') {
        $user_abs = get_uab($user_id, 'b');	
    } else if ($relType == 'supporters') {
        $user_abs = get_uab($user_id, 'a');
    } else if ($relType == 'block') {
        $user_abs = get_uab($user_id, 'bl');
    }		
    if (empty($user_abs)) {
        ?>
        <h2 style="text-align: center" class="brown textShadow">None</h2>
        <?php
    } else {
        ?>
        <ul id="dga_rel">
			<?php
			foreach ($user_abs as $user_ab) {	
                $uab_names = get_users($user_ab['id']);
                foreach ($uab_names as $uab_name) {
                    $imgs = show_profile_imgs($user_ab['id']);
                    $image_file = '<img src="http://localhost/xxx/';	
                    if (empty($imgs)) {
                        $image_file .= 'img/prof.gif" />';
                    } else {
                        foreach ($imgs as $img) {
                            $image_file .= 'uploads/p_img/pro/'.$img['name'].'.'.$img['ext'].'" alt="" />'; 
                        }
                    } 
                    ?>
                    <li class="relBox dgaLifted dgaDropShadow" id="rel_<?php echo $user_ab['id']; ?>">
                        <a href="/u/<?php echo $uab_name['username']; ?>"><h4 style="text-align: center;margin-top: 5px;"><?php echo $uab_name['fullname']; ?></h4></a>
                        <div class="relMainBox">
                            <div class="relMainBoxL">
                                <a href="/u/<?php echo $uab_name['username']; ?>"><?php echo $image_file; ?></a>
                            </div>
                            <div class="relMainBoxR">
                                <p class="greenL">@<?php echo $uab_name['username']; ?></p>
                                <?php
                                if (logged_in() && ($user_ab['id'] != logged_in()) && rel_check($user_ab['id'], 'iBlocked') === false) {
                                    include 'extra/relSetting.php';       
                                }
                                ?>					
                            </div>
                        </div>
                    </li>
                    <?php
                }					
            }
            ?>
        </ul>
        <?php
    }
?>