<?php
$encoded_url = urlencode(curPgURL());

$show_dga_imgs = show_dga_imgs($dga_id, $user_id);

$pin_img = 'https://teloslist.com/xxx/';

if (empty($show_dga_imgs)) {	
	$pin_img .= 'img/tl.png';				
} else {
	foreach ($show_dga_imgs as $show_dga_img) {				
		$pin_img .= 'uploads/dga_img/org/'.$show_dga_img['name'].'.'.$show_dga_img['ext'];	
	}
}			
$pin_img = urlencode($pin_img);
?>

<div id="share_box">
    <div id="share_fb">
        <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-action="like" data-font="verdana"></div>
    </div>    
    <div id="share_twitter">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo curPgURL();?>" data-text="<?php echo $dga['dga'];?>" data-via="teloslist" data-lang="en">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>		    
    </div>
    <div id="share_google">
        <g:plusone size="medium"></g:plusone>
    </div>
    <div id="share_pin">
    	<a href="http://pinterest.com/pin/create/button/?url=<?php echo $encoded_url.'&media='.$pin_img;?>&description=<?php echo $dga['dga'];?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
    </div>
</div>