<?php
// Yes
// Clickable Link
function clickable_link($text = '') {
	$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
	$ret = ' ' . $text;
	$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a class=\"blue\" href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		
	$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a class=\"blue\" href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a class=\"blue\" href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
	$ret = substr($ret, 1);
	return $ret;
}
// -> Yes

// Check Values
// Yes
function check_values($value) {
	//Remove white spaces
	$value = preg_replace('#[\r\n]+#', "\n", $value);
	
	//Trim the comment
	$value = trim($value);
 
	// Stripslashes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
 
	// Convert all &lt;, &gt; etc. to normal html and then strip these
	$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
 
	// Strip HTML Tags
	$value = strip_tags($value);
 
	// Quote the comment
	$value = mysql_real_escape_string($value);
	$value = htmlspecialchars ($value, ENT_QUOTES);
	
	return $value;
}
// -> Yes

// Yes
// Check Values 2
function check_values2($value) {
	//Remove white spaces
	$value = preg_replace('#[\r\n]+#', "\n", $value);
	
	//Trim the comment
	$value = trim($value);
 
	// Stripslashes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
 
	// Convert all &lt;, &gt; etc. to normal html and then strip these
	$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
 
	$value = htmlspecialchars ($value, ENT_QUOTES);	
	
	$value = str_replace("\0", "", $value);
	
	return $value;
}
// -> Yes

// Yes
// Time
function time_posted($before) {
	$time = array (
			array(60 * 60 * 24 * 365, 'year'),
			array(60 * 60 * 24 * 30, 'month'),
			array(60 * 60 * 24 * 7, 'week'),
			array(60 * 60 * 24, 'day'),
			array(60 * 60, 'hour'),
			array(60, 'minute'),
			array(1, 'second'),
		);
				
	$now = time();
	
	$ago = $now - $before;
	
	for ($i = 0, $j = count($time); $i < $j; $i++) {
		
		$seconds = $time[$i][0];
		$type = $time[$i][1];
		
		if (($count = floor($ago / $seconds)) != 0) {
			break;
		}
	}
	
	$posted = ($count == 1) ? '1 '.$type.' ago' : "$count {$type}s ago";
	
	if ($posted == '0 seconds ago') {
		$posted = 'a few moments ago';	
	}
	
	return $posted;
}
// -> Yes

// Check Alphanumerics
// Yes
function check_alphan($value) {	
	if (!ctype_alnum(str_replace('_', '', $value))) {
	//if (!ctype_alnum(str_replace(str_split('_.'), '', $value))) {		
		return 'bad';	
	} 
}
// -> Yes

// Yes
// Check/Get current URL
function curPgURL() {
	$pageURL = 'http';
 	if (!empty($_SERVER['HTTPS']) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 		$pageURL .= "://";
 	if ($_SERVER["SERVER_PORT"] != "80") {
  		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 	} else {
  		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 	}
 	return $pageURL;
}
// -> Yes

// Yes
// Redirect to HTTPS
function redirectToHTTPS() {
	if($_SERVER['HTTPS'] != "on") {
    	$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     	header("Location: $redirect");
  	}
}

// Redirect to HTTP
function redirectToHTTP() {
	if($_SERVER['HTTPS'] == "on") {
    	$redirect= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     	header("Location: $redirect");
  	}
}
// -> Yes

// Yes
// Generate unique random alpha-numeric strings
function generate_an_img($length) {
	
	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$string = '';
	
	for ($i = 0; $i < $length; $i++) {
		$string .= $characters[mt_rand(0, strlen($characters) - 1)];		
	}
	
	return $string;		
}
// -> Yes

// Yes
function name_img($length) {

	for ($i = 0; ; $i++) {		
		$name = generate_an_img($length);
		
		$img_query = "SELECT COUNT(`img_id`) as `count` FROM ";
		
		if ($length == 29) {
			$img_query .= "`dga_img`";	
		} else if ($length == 7) {		
			$img_query .= "`p_img`";			
		}
		
		$img_query .= " WHERE `name`='$name'";
		$img_query = mysql_query($img_query);
		
		if (mysql_result($img_query, 0) == 0) {
			break;
		}
	}
	
	return $name;		
}
// -> Yes
?>