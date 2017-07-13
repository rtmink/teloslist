<div id="shareFormD">
    <div class="sharePt1"><h1>Share Dream</h1><span class="shareClose"></span></div>
    <div class="sharePt2">
        <form>	
            <textarea name="dream" id="dream" rows="6" maxlength="140" placeholder="What's your Dream?" ></textarea>
            <input type="hidden" id="dream_type" value="d" />        
        </form>
        <div class="dga_btn_div">
            <div class="dga_hidden" id="dga_hidden_dream">
                <input type="button" class="buttonL dga_button" id="dream_button" value="Share" />
                <div id="display_count_dream"></div>
                <div class="clear"></div>
            </div>
            <ul class="urlOrUp right">
                <li>
                    <h6 class="url_button" id="dream_url_button" title="Use a URL">URL</h6>           
                </li>
                <li>
                    <span class="camera_button" id="dream_camera_button"></span>
                </li>    
            </ul>
        </div> 
        <div class="dga_img_div">
            <form id="dream_img_form" method="post" enctype="multipart/form-data" action="/ajax/d_img.php">
                <input type="file" class="dga_img_button" id="dream_img" name="dream_img" />  
            </form>
            <form id="dream_url_preview" method="post" action="/ajax/d_url.php">
                    <div class="dga_preview"><input type="button" class="buttonUpl" id="dream_url_button" value="Upload"/></div>
                    <input type="text" class="dga_input" id="dream_input" name="dream_input" />        
            </form>
        </div>
    </div>
    <div class="sharePt3">
        <span class="shareInfoUpload">Add an Image</span>
        <span class="arrow"></span>
        <div class="dga_img_preview" id="dream_img_preview"><div class="dga_img_preview2"><ul><li></li></ul></div></div>
        <div class="url_img_preview" id="dream_url_img_preview"><ul><li></li></ul></div>
    </div>
</div>