<div class="left_pointer2"></div>
<div id="obj_main" class="boxShadow">
	<div class="dga_tab_obj">
        <h4>
            <?php
            if ($dga_type == 'd') {
                echo 'Inspirations';
            } else {
                echo 'Objectives';
            }
            ?>
        </h4>
        <?php 
        if (logged_in() && $user_id == logged_in()) {
        ?>
            <div class="dga_hidden2" id="dga_hidden_obj">
                <div id="display_count_obj"></div>
                <input type="button" class="buttonR" id="obj_button" value="List" />
            </div>
        <?php
        }
        ?>
        <div class="clear"></div>
    </div>
    
    <?php 
    if ($dga_type == 'g' && acc_goal_check($dga_id) === false) {
        $placeholder = 'What\'s your objective?';	
    } else if($dga_type == 'a' || acc_goal_check($dga_id) === true) {
        $placeholder = 'What did you do?';
    } else if ($dga_type == 'd') {
        $placeholder = 'What inspires you?';
    }
        
    if (logged_in() && $user_id == logged_in()) {
    ?>
        <div class="dga_box_obj">
            <form>                        
                <textarea name="obj" id="obj" rows="1" cols="29" maxlength="140" placeholder="<?php echo $placeholder; ?>"></textarea>
                <input type="hidden" id="goal_id_obj" name="goal_id_obj" value="<?php echo $dga_id; ?>" />
            </form>
        </div>
        <script type="text/javascript" src="xxx/js/del_obj.js"></script>
    <?php
    }
    include 'extras/obj_body.php';
    ?>
</div>