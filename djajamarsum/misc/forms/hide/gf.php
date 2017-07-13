<div id="shareFormG">
    <div class="sharePt1"><h1>Share Goal</h1><span class="shareClose"></span></div>
    <div class="sharePt2">
        <form>
            <textarea name="goal" id="goal" rows="6" maxlength="140" placeholder="What's Your Goal?"></textarea>        
            <input type="hidden" id="goal_type" value="g" />
        </form>
        <div class="dga_btn_div">
            <div class="dga_hidden" id="dga_hidden_goal"> 	
                <input type="button" class="buttonL dga_button" id="goal_button" value="Share" />
                <div id="display_count_goal"></div>
                <div class="clear"></div>
            </div>
            <ul class="urlOrUp right">
                <li id="smartInfo_button">
                    <h6>G</h6>
                </li>
                <li>
                    <h6 class="url_button" id="goal_url_button" title="Use a URL">URL</h6>
                </li>
                <li>
                    <span class="camera_button" id="goal_camera_button"></span>
                </li>
            </ul>
        </div> 
        <div class="dga_img_div">	
            <form id="goal_img_form" method="post" enctype="multipart/form-data" action="/ajax/g_img.php">
                <input type="file" class="dga_img_button" id="goal_img" name="goal_img" />
            </form>
            <form id="goal_url_preview" method="post" action="/ajax/g_url.php">
                <div class="dga_preview"><input type="button" class="buttonUpl" id="goal_url_button" value="Upload"/></div>
                <input type="text" class="dga_input" id="goal_input" name="goal_input" />
            </form>
        </div>
    </div>
    <div class="sharePt3">
        <span class="shareInfoUpload">Add an Image</span>
        <span class="arrow"></span> 
        <div class="dga_img_preview" id="goal_img_preview"><div class="dga_img_preview2"><ul><li></li></ul></div></div>
        <div class="url_img_preview" id="goal_url_img_preview"><ul><li></li></ul></div>
    </div>
</div>