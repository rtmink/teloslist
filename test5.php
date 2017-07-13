<?php

if (!empty($_GET['pnumber']) && !empty($_GET['carrier']) && !empty($_GET['message']) && isset($_GET['pnumber'], $_GET['carrier'], $_GET['message'])) {

	$recipient = $_GET['pnumber'];
	
	switch($_GET['carrier']){
	
		case "verizon":
		
		$recipient .= "@vtext.com";
		
		break;
		
		case "att":
		
		$recipient .= "@txt.att.net";
		
		break;
		
		case "tmobile":
		
		$recipient .= "@tmomail.net";
		
		break;
	
	}
	
	$message = stripslashes($_GET['message']);
			
	$body = $message;
	
	$header = "From: sms@teloslist.com";
	
	mail($recipient,"",$body,$header);

} else {
	$_GET['pnumber'] = '';
	$_GET['carrier'] = '';
	$_GET['message'] = '';	
}
?>

<form>
	<input type="text" name="pnumber" size="100" placeholder="Phone Number" value="<?php echo $_GET['pnumber']; ?>" />
    <input type="text" name="carrier" size="100" placeholder="Carrier" value="<?php echo $_GET['carrier']; ?>" />
    <textarea name="message" rows="10" cols="70" placeholder="Message"><?php echo $message; ?></textarea>
	<input type="submit" />
</form>