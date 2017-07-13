<?php
// Yes
function create_dga_img_rs($directory, $image, $destination, $resizeWidth) {
  ini_set('memory_limit', '-1');	
	
  $image_file = $image;
  $image = $directory.$image;

  if (file_exists($image)) {

    $source_size = getimagesize($image);

    if ($source_size !== false) {

      switch($source_size['mime']) {
        case 'image/jpeg':
             $source = imagecreatefromjpeg($image);
        break;
        case 'image/png':
             $source = imagecreatefrompng($image);
        break;
        case 'image/gif':
             $source = imagecreatefromgif($image);
        break;
      }
	  
	  $img_width = imagesx($source);
      $img_height = imagesy($source);
	  
	  if ($img_width > $resizeWidth) {
		  $ratio = $resizeWidth/$img_width;
		  $new_height = $img_height * $ratio;
		  $new_width = $resizeWidth;
	  } else {
		 $new_width = $img_width;
		 $new_height = $img_height; 
	  }

      $new_img = imagecreatetruecolor($new_width, $new_height);
	  $white = imagecolorallocate($new_img, 255, 255, 255);
	  imagefill($new_img, 0, 0, $white);
      imagecopyresampled($new_img, $source, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height);

      switch($source_size['mime']) {
        case 'image/jpeg':
             imagejpeg($new_img, $destination.$image_file, 95);
        break;
        case 'image/png':
              imagepng($new_img, $destination.$image_file, 9);
        break;
        case 'image/gif':
             imagegif($new_img, $destination.$image_file);
        break;
      }

    }

  }
}
?>