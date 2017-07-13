<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (logged_in() && !empty($_POST[$type]) && isset($_POST[$type])) {
	
	// By default get_headers uses a GET request to fetch the headers. If you
	// want to send a HEAD request instead, you can do so using a stream context:
	stream_context_set_default(
		array(
			'http' => array(
				'method' => 'HEAD'
			)
		)
	);
	
	$url = check_values($_POST[$type]);
	
	if ($url != '') {
		
		$headers = @get_headers($url, 1);
		
		$explode = @explode('/', $headers['Content-Type']);
		
		if ($explode[0] == 'image') {
			
			// Find Type of IMG
			$imgType = exif_imagetype($url);

			if ($imgType == IMAGETYPE_GIF || $imgType == IMAGETYPE_JPEG || $imgType == IMAGETYPE_PNG) {
				
				$img_type = explode('_', $type);
			
				echo '<span class="left"><p class="brown textShadow">Click Share to post the picture!</p></span>';
				echo '<span class="right trash2 dlt_url_img" id="dlt_url_img_', $img_type[0],'"></span>';
				echo '<div class="clear"></div>';				
				echo '<img class="url_img_rs" src="', $url, '" />';
				echo '<input type="hidden" id="', $img_type[0],'_img_url" value="', $url,'" />';
				echo '<script type="text/javascript" src="/xxx/js/del_url_img.js"></script>';
			} else {
				
				echo '<p class="red textShadow">Invalid Image</p>';
				
			}
			// End Here
			
		} else {
			echo '<p class="red textShadow">Cannot Find Image</p>';	
		}
		
	} else {
		echo '<p class="red textShadow">Cannot Find Image</p>';
	}
	
} else {
	include '../pnf.php';	
}
?>