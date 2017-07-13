<?php
$imgs = get_profile_imgs(); 

echo '<img id="com_p_img" src="xxx/';

if (empty($imgs)) {

	echo 'img/prof3.gif" />';

  } else {
	foreach ($imgs as $img) {
	echo 'uploads/p_img/com/', $img['name'], '.', $img['ext'], '" alt="" />'; 
	}
  } 
?>

<div id="com_main" class="boxShadow">    
    <form id="com_form">	
        <?php 
            include 'header/com_header.php'; 
            if (rel_check($user_id, 'iBlocked') === true || rel_check($user_id, 'block') === true) {
                $disabled = 'disabled="disabled"';
            }
        ?>
        <div class="dga_box_com">
            <textarea name="com" class="com" id="com" rows="3" cols="29" maxlength="140" placeholder="What do you think?" <?php if (isset($disabled)) {echo $disabled;} ?>></textarea>
            <input type="hidden" id="dga_id_com" name="dga_id_com" value="<?php echo $dga_id; ?>" />
        </div>
    </form>
</div>
<?php include 'extras/com_body.php' ;?>

<script type="text/javascript" src="xxx/js/del_com.js" ></script> 