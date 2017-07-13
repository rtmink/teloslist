<?php
// Yes
function logged_in() {
	if (isset($_SESSION['user_id'])) {
		return $_SESSION['user_id'];
		
	} else if (isset($_COOKIE['handsomeBoy'])) {
		
		$cookie = $_COOKIE['handsomeBoy'];
		$hb_query = mysql_query("SELECT COUNT(`user_id`) as `count`, `user_id` FROM `users` WHERE `cookie`='$cookie'");
		
		return (mysql_result($hb_query, 0) == 1) ? (mysql_result($hb_query, 0, 'user_id')) : false;			
	} 	
}
// -> Yes
// Yes
function store_cookies($handsomeBoy, $user_id) {
	$user_id = (int)$user_id;
	$handsomeBoy = mysql_real_escape_string($handsomeBoy);
	
	mysql_query("UPDATE `users` SET `cookie`='$handsomeBoy' WHERE `user_id`='$user_id'");	
}
// -> Yes
// Yes
function getRealIpAddr() {
	// Check ip from share internet
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	
	// To check ip is pass from proxy
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
		$ip = $_SERVER['REMOTE_ADDR'];	
	}
    return $ip;
}
// -> Yes
// Yes
function updateIP($user_id) {
	$ip = getRealIpAddr();
	$user_id = (int)$user_id;
	
	mysql_query("UPDATE `users` SET `ip`='$ip' WHERE `user_id`='$user_id'");
}
// -> Yes
// Yes
function signin_check($email, $password) {
	$email = check_values($email);
	$password = mysql_real_escape_string(stripslashes($password));
  	$signin_query = mysql_query("SELECT COUNT(`user_id`) as `count`, `user_id` FROM `users` WHERE `email`='$email' AND `password`='".md5($password)."'");
  	return (mysql_result($signin_query, 0) == 1) ? mysql_result($signin_query, 0, 'user_id') : false;
}
// -> Yes

// Yes
function email_check($email) {
	$email = check_values($email);
  	$signin_query = mysql_query("SELECT COUNT(`user_id`) as `count`, `user_id` FROM `users` WHERE `email`='$email'");
  	return (mysql_result($signin_query, 0) == 1) ? mysql_result($signin_query, 0, 'user_id') : false;
}
// -> Yes

// Let me think about it
function user_data() {
  	$args = func_get_args();
  	$fields = '`'.implode('`, `', $args).'`';

  	$query = mysql_query("SELECT $fields FROM `users` WHERE `user_id`=".logged_in());
  	$query_result = mysql_fetch_assoc($query);
  	foreach ($args as $field) {
    	$args[$field] = $query_result[$field];
  	}
  	return $args;
}
// OK

// Yes
function get_users($user_id) {
  	$user_id = (int)$user_id;  
	
  	$users = array();

  	$user_query = mysql_query("SELECT `username`, `fullname`, `bio` FROM `users` WHERE `user_id`=$user_id");
  	while ($users_row = mysql_fetch_assoc($user_query)) {
    	$users[] = array(
	      	'username' => $users_row['username'],
		  	'fullname' => $users_row['fullname'],
	      	'bio' => $users_row['bio']
    	);
  	}
  	return $users;
}
// -> Yes
// No need
function get_unid($un) {	
	$user_query = mysql_query("SELECT COUNT(`user_id`) as `count`, `user_id` FROM `users` WHERE `username`='$un'");
	return (mysql_result($user_query, 0) == 1) ? mysql_result($user_query, 0, 'user_id') : false;
}
// -> No Need
// Yes
function user_signup($email, $username, $fullname, $password) {
  	$email = check_values($email);
  	$username = check_values($username);
  	$fullname = check_values($fullname);
  	$password = mysql_real_escape_string(stripslashes($password));
	$ip = getRealIpAddr();
  	mysql_query("INSERT INTO `users` VALUES ('', '$email', '$username', '$fullname', '".md5($password)."', '', '', '', '', UNIX_TIMESTAMP(), '$ip')");
  	return mysql_insert_id(); 
}
// -> Yes
// Yes
function email_exists($email) {
  	$email = check_values($email);
  	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email`='$email'");
  	return (mysql_result($query, 0) == 1) ? true : false;
}
// -> Yes
// Yes
function username_exists($username) {
  	$username = check_values($username);
  	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username`='$username'");
  	return (mysql_result($query, 0) == 1) ? true : false;
}
// -> Yes
// No need
function username($user_id) {
  	$user_id = (int)$user_id; 
  	$query = mysql_query("SELECT COUNT(`user_id`), `username` FROM `users` WHERE `user_id`='$user_id'");
  	return (mysql_result($query, 0) == 1) ? mysql_result($query, 0, 'username') : false;
}
// -> No Need
// Reset password

// Yes
function user_key($email, $key, $time_ex) {
	$email = check_values($email);
	
	mysql_query("UPDATE `users` SET `key`='$key', `time_ex`='$time_ex' WHERE `email`='$email'");
}
// -> Yes
// Yes
function user_email($email) {
	$email = check_values($email);
	
	$users = array();

  	$user_query = mysql_query("SELECT `user_id` FROM `users` WHERE `email`='$email'");
  	while ($users_row = mysql_fetch_assoc($user_query)) {
    	$users[] = array(
	      'user_id' => $users_row['user_id']
    	);
  	}
  	return $users;
}
// -> Yes
// Yes
function key_check($user_id, $key) {
	$user_id = (int)$user_id;
	$key = mysql_real_escape_string($key);
	
  	$key_query = mysql_query("SELECT COUNT(`user_id`) as `count` FROM `users` WHERE `user_id`='$user_id' AND `key`='$key'");
  	return (mysql_result($key_query, 0) == 1) ? true : false;	
}
// -> Yes

// Yes
function time_check($user_id, $key) {
	$user_id = (int)$user_id;
	$key = mysql_real_escape_string($key);
	
	$times = array();

  	$time_query = mysql_query("SELECT `time_ex` FROM `users` WHERE `user_id`='$user_id' AND `key`='$key'");
  	while ($times_row = mysql_fetch_assoc($time_query)) {
    	$times[] = array(
	      'time_ex' => $times_row['time_ex']
    	);

  	}
  	return $times;
}
// -> yes
// Yes
function get_u_email($user_id, $key) {
	$user_id = (int)$user_id;
	$key = mysql_real_escape_string($key);
	
	$users = array();

  	$user_query = mysql_query("SELECT `email` FROM `users` WHERE `user_id`='$user_id' AND `key`='$key'");
  	while ($users_row = mysql_fetch_assoc($user_query)) {
    	$users[] = array(
	      'email' => $users_row['email']
    	);

  	}
  	return $users;
}
// -> Yes
// Yes
function reset_password($user_id, $key, $reset_password) {
	$user_id = (int)$user_id;
	$key = mysql_real_escape_string($key);
  	$reset_password = mysql_real_escape_string(stripslashes($reset_password));  

  	mysql_query("UPDATE `users` SET `password`='$reset_password' WHERE `user_id`='$user_id' AND `key`='$key'");
}
// -> Yes
?>