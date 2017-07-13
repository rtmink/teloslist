<?php
// Yes
function change_password($new_password) {
	$new_password = mysql_real_escape_string(stripslashes($new_password));  
	
	mysql_query("UPDATE `users` SET `password`='$new_password' WHERE `user_id`=".logged_in());
}
// -> Yes

// Yes
function change_details($email, $username, $fullname, $bio) {
	
	$bio = check_values($bio);
	$email = check_values($email);
	$username = check_values($username);
	$fullname = check_values($fullname);
  	mysql_query("UPDATE `users` SET `email`='$email', `username`='$username', `fullname`='$fullname', `bio`='$bio' WHERE `user_id`=".logged_in()); 
}
// -> Yes

// Yes
function check_email($email) {
	$email = check_values($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email`='$email' AND `user_id` !=".logged_in());
	return (mysql_result($query, 0) == 1) ? true : false;
}

function check_username($username) {	
	$username = check_values($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username`='$username' AND `user_id` !=".logged_in());
	return (mysql_result($query, 0) == 1) ? true : false;
}
// -> Yes

// Yes
function block_username($username) {
	$array = array(
		"ryantmink",
		"ryant_mink",
		"trihernawan",
		"jamestopputo",
		"james_topputo",
		"topputo",
		"twitter",
		"facebook",
		"youtube",
		"teloslistfoundation",
		"dream","dreams","goal","goals","accomplishment","accomplishments","calendar","mail","email","telosmail","todolist","notes","image","images","photo","photos","picture",
		"pictures","movie","movies","book","books","search","news","tmail","video","videos","about","contact","signin","signup","login","reset_password","forgot_password","signout",
		"logout","dga","smart","index","admin","team","blog","api","mobile","design","media","support","settings","mobilesupport","music","all","tos",
		"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0"
	);
	
	for ($i = 0, $j = count($array); $i < $j; $i++) {
		
		if ($username == $array[$i]) {
			return ($username == $array[$i]) ? true : false;
			break;			
		}		
	}	
}
// -> Yes
?>