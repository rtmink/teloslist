<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

$page_title = 'Teloslist &bull; DGA';
$meta_description = 'Get inspired by other\'s dreams, goals, and accomplishments.';

include 'djajamarsum/template/header.php';

if (isset($_GET['as']) && !empty($_GET['as'])) {
	
	if (($_GET['as'] == 'd' || $_GET['as'] == 'g' || $_GET['as'] == 'a')) {
		
		$dgaType = $_GET['as'];
		include 'djajamarsum/listing/dga_body.php';
		
	} else {
		header('Location: dga');
		exit();		
	}
	
} else {
	$dgaType = 'all';	
	include 'djajamarsum/listing/dga_body.php';
}

include 'djajamarsum/template/footer.php';
?>