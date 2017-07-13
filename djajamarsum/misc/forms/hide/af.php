<div id="shareFormA">
    <div class="sharePt1"><h1>Share Accomplishment</h1><span class="shareClose"></span></div>
    <div class="sharePt2">
        <form>
            <textarea name="acc" id="acc" rows="6" maxlength="140" placeholder="What's your Accomplishment?"></textarea>        
            <input type="hidden" id="acc_type" value="a" />
        </form>
		<div class="dga_btn_div">        
            <div class="dga_hidden" id="dga_hidden_acc">            
                <input type="button" class="buttonL dga_button" id="acc_button" value="Share" />
                <div id="display_count_acc"></div>
                <div class="clear"></div>
            </div>
            <ul class="urlOrUp right">
                <li id="date_button">
                    <h6>Choose A Date</h6>
                </li>
                <li>
                    <h6 class="url_button" id="acc_url_button" title="Use a URL">URL</h6>
                </li>
                <li>
                    <span class="camera_button" id="acc_camera_button"></span>
                </li>
            </ul>
        </div>
        <div class="dga_img_div">
            <form id="acc_img_form" method="post" enctype="multipart/form-data" action="/ajax/a_img.php">
                <input type="file" class="dga_img_button" id="acc_img" name="acc_img" />
            </form>
            <form id="acc_url_preview" method="post" action="/ajax/a_url.php">
                <div class="dga_preview"><input type="button" class="buttonUpl" id="acc_url_button" value="Upload"/></div>
                <input type="text" class="dga_input" id="acc_input" name="acc_input" />
            </form>
        </div>    
    </div>
    <div class="sharePt3">
        <span class="shareInfoUpload">Add an Image</span>
        <span class="arrow"></span>
        <div class="dga_img_preview" id="acc_img_preview"><div class="dga_img_preview2"><ul><li></li></ul></div></div>
        <div class="url_img_preview" id="acc_url_img_preview"><ul><li></li></ul></div>    
    </div>
</div>