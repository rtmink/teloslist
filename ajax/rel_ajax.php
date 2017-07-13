<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';
  
if (logged_in()) {

	if (!empty ($_POST['user_id_rel']) && isset($_POST['user_id_rel'])) {
		$user_id_rel = $_POST['user_id_rel'];
		
		if (rel_check($_POST['user_id_rel'], 'uB') === false && rel_check($_POST['user_id_rel'], 'block') === false) {
			post_rel($user_id_rel);	
		} else {
			
			if (rel_check($_POST['user_id_rel'], 'block') === true && rel_check($_POST['user_id_rel'], 'blocked') === true) {
				dlt_rel($user_id_rel, 'uB');	
				dlt_rel($user_id_rel, 'iB');
			} else {
				dlt_rel($user_id_rel, 'uB');	
			}
			
		}
		
	}
	
	if (!empty ($_POST['uIdRel']) && isset($_POST['uIdRel']) && !empty ($_POST['relType']) && isset($_POST['relType'])) {
		$uIdRel = $_POST['uIdRel'];
		$relType = $_POST['relType'];
		
		if ($relType == 'block') {
			
			if (rel_check($_POST['uIdRel'], 'block') === true && rel_check($_POST['uIdRel'], 'blocked') === true) {
				dlt_rel($uIdRel, 'uB');	
				dlt_rel($uIdRel, 'iB');
			} else {
				block_rel($uIdRel);	
			}
			
		} else {
			
			if (rel_check($_POST['uIdRel'], 'uB') === false && rel_check($_POST['uIdRel'], 'block') === false) {
				post_rel($uIdRel);	
			} else {
				dlt_rel($uIdRel, 'uB');
			}
				
		}
		
	}

} else {
	include '../pnf.php';
}
?>