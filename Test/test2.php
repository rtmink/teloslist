<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

function get_ip_address()
{
$header_checks = array(
'HTTP_CLIENT_IP',
'HTTP_PRAGMA',
'HTTP_XONNECTION',
'HTTP_CACHE_INFO',
'HTTP_XPROXY',
'HTTP_PROXY',
'HTTP_PROXY_CONNECTION',
'HTTP_VIA',
'HTTP_X_COMING_FROM',
'HTTP_COMING_FROM',
'HTTP_X_FORWARDED_FOR',
'HTTP_X_FORWARDED',
'HTTP_X_CLUSTER_CLIENT_IP',
'HTTP_FORWARDED_FOR',
'HTTP_FORWARDED',
'ZHTTP_CACHE_CONTROL',
'REMOTE_ADDR'
);

foreach ($header_checks as $key)
if (array_key_exists($key, $_SERVER) === true)
foreach (explode(',', $_SERVER[$key]) as $ip)
{
$ip = trim($ip);
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
return $ip;
}
}

date_default_timezone_set('America/Los_Angeles');
$time=date('F j, Y, g:i A','1345362260');
echo $time;

function check_values3($value) {
	//Remove white spaces
	$value = preg_replace('#[\r\n]+#', "\n", $value);
	
	//Trim the comment
	$value = trim($value);
 
	// Stripslashes
	
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
	
	// Convert all &lt;, &gt; etc. to normal html and then strip these
	//$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
 
	$value = htmlentities ($value, ENT_QUOTES);	
	
	$value = str_replace("\0", "", $value);
	
	return $value;
}

if (isset($_GET['x'])) {
	echo check_values3($_GET['x']);
}

//$x = msgbox("foo");window.alert('bar');

//echo check_values3($x);

?>

<form>
	<input type="text" name="x" value="<?php echo check_values3($_GET['x']);?>" />
</form>