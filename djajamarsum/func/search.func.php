<?php
// Yes
function search($terms) {
	
	$dga = array();
	
	$query = "SELECT * FROM `dga` WHERE ";
	
	for ($i = 0, $j = count($terms); $i < $j; $i++) {
			
		if ($i == 0) {
			$query .= "`dga` RLIKE '[[:<:]]" . mysql_real_escape_string(htmlspecialchars($terms[$i])) . "[[:>:]]'";
			//$query .= "`dga` LIKE '%$terms[$i]%'";
			//$query .= "`dga`='$terms[$i]'";
		} else {
			$query .= " AND `dga` RLIKE '[[:<:]]" . mysql_real_escape_string(htmlspecialchars($terms[$i])) . "[[:>:]]'";
			//$query .= " AND `dga` LIKE '%$terms[$i]%'";
			//$query .= " AND `dga`='$terms[$i]'";
		}
	}
	
	$query .= " ORDER BY `dga_id` DESC";
	
	$query = mysql_query($query);
	$numrows = mysql_num_rows($query);
	
	if ($numrows > 0) {
		
		while ($row = mysql_fetch_assoc($query)) {
			$dga[] = array(
				'id' => $row['dga_id'],
				'user_id' => $row['user_id'],
				'ts' => $row['ts'],
				'type' => $row['type'],
				'dga' => $row['dga'],
				'acc' => $row['acc'],
				'ts_acc' => $row['ts_acc']  
			);
		}
		return $dga;		
	} 
}

function searchPeople($terms) {
	
	$users = array();
	
	$query = "SELECT * FROM `users` WHERE ";
	
	for ($i = 0, $j = count($terms); $i < $j; $i++) {
			
		if ($i == 0) {
			$query .= "`fullname` RLIKE '[[:<:]]" . mysql_real_escape_string(htmlspecialchars($terms[$i])) . "[[:>:]]'";
		} else {
			$query .= " AND `fullname` RLIKE '[[:<:]]" . mysql_real_escape_string(htmlspecialchars($terms[$i])) . "[[:>:]]'";
		}
	}
	
	$query .= " ORDER BY `user_id` DESC";
	
	$query = mysql_query($query);
	$numrows = mysql_num_rows($query);
	
	if ($numrows > 0) {
		
		while ($row = mysql_fetch_assoc($query)) {
			$users[] = array(
				'id' => $row['user_id'],
				'username' => $row['username'],
				'fullname' => $row['fullname']
			);
		}
		return $users;		
	} 
}
// -> Yes
?>