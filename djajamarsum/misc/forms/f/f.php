<div class="sharePt1"><h1>Share <?php echo $title; ?></h1><span class="shareClose"></span></div>
<div class="sharePt2">
    <div class="sharePt2a">
        <form>
            <textarea name="<?php echo $short; ?>" id="<?php echo $short; ?>" rows="6" maxlength="140" placeholder="What's your <?php echo $title; ?>?"></textarea>        
            <input type="hidden" id="<?php echo $short; ?>_type" value="<?php echo $value; ?>" />
        </form>
        <div class="dga_btn_div">
            <div class="dga_hidden" id="dga_hidden_<?php echo $short; ?>"> 	
                <input type="button" class="buttonL dga_button" id="<?php echo $short; ?>_button" value="Share" />
                <div id="display_count_<?php echo $short; ?>"></div>
                <div class="clear"></div>
            </div>
            <ul class="urlOrUp right">
                <?php echo $secret; ?>
                <li class="buttonR buttonUrlOrUp">
                    <h6 class="url_button" id="<?php echo $short; ?>_url_button" title="Use a URL">URL</h6>
                </li>
                <li class="buttonR buttonUrlOrUp">
                    <span class="camera_button" id="<?php echo $short; ?>_camera_button"></span>
                </li>
            </ul>
        </div> 
        <div class="dga_img_div">	
            <form id="<?php echo $short; ?>_img_form" method="post" enctype="multipart/form-data" action="/ajax/<?php echo $value; ?>_img.php">
                <input type="file" class="dga_img_button" id="<?php echo $short; ?>_img" name="<?php echo $short; ?>_img" />
            </form>
            <form id="<?php echo $short; ?>_url_preview" method="post" action="/ajax/<?php echo $value; ?>_url.php">
                <div class="dga_preview"><input type="button" class="button buttonUpl" id="<?php echo $short; ?>_url_button" value="Upload"/></div>
                <input type="text" class="dga_input" id="<?php echo $short; ?>_input" name="<?php echo $short; ?>_input" />
            </form>
        </div>
    </div>
    <div class="sharePt2b">
        <span class="shareInfoUpload">Add an Image</span>
        <span class="arrow"></span> 
        <div class="dga_img_preview" id="<?php echo $short; ?>_img_preview"><div class="dga_img_preview2"><ul><li></li></ul></div></div>
        <div class="url_img_preview" id="<?php echo $short; ?>_url_img_preview"><ul><li></li></ul></div>
    </div>
</div>