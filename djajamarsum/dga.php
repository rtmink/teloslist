<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

if (isset($_GET['x']) && !empty($_GET['x'])) {
		
	$dga_id = $_GET['x'];
	$dgas = get_dga_id($dga_id, $dga_type);
		
	if (empty($dgas)) {		
		$page_title = 'Page Not Found';			
	} else {			
		foreach ($dgas as $dga) {
			
			$user_titles = get_users($dga['user_id']);
			foreach ($user_titles as $user_title) {}
				
				$page_title = $user_title['fullname'].'\'s ';
				
				if ($dga_type == 'd') {
					$page_title .= 'Dream';
				} elseif ($dga_type == 'g') {
					
					if (acc_goal_check($dga_id) === true) {
						$page_title .= 'Accomplished Goal';
					} else {
						$page_title .= 'Goal';
					}
				
				} elseif ($dga_type == 'a') {
					$page_title .= 'Accomplishment';
				}
			
			$meta_description = $dga['dga'];				
		}		
	}
		
} else {
	$page_title = 'Page Not Found';		
}

$page_title .= ' &bull; Teloslist';
	
include 'djajamarsum/template/header.php';
?>

<div id="main2">

<?php
if (!logged_in()) {
	
	if (isset($_GET['x']) && !empty($_GET['x'])) {
	
		$dga_id = $_GET['x'];
		$dgas = get_dga_id($dga_id, $dga_type);
		
		if (empty($dgas)) {
			include 'djajamarsum/dga/pnf.php';	
		} else {	
			include 'djajamarsum/dga/nid_dga.php';	
		}	
	} else {
		include 'djajamarsum/dga/pnf.php';
	}
	
} else {
	
	if (isset($_GET['x']) && !empty($_GET['x'])) {
		
		$dga_id = $_GET['x'];
		$dgas = get_dga_id($dga_id, $dga_type);
		
		if (empty($dgas)) {	
			include 'djajamarsum/dga/pnf.php';		
		} else {
			
			foreach ($dgas as $dga) {
			$user_id = $dga['user_id'];	
		
				if ($user_id == logged_in()) {	
					include 'djajamarsum/dga/my_dga.php';
				} else {
					include 'djajamarsum/dga/id_dga.php';
				}
			}
		}

	} else {
		include 'djajamarsum/dga/pnf.php';
	}
}
?>

</div>

<?php include 'djajamarsum/template/footer.php';?>

<script type="text/javascript" src="xxx/js/dgaFe.js"></script>