<?php
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

if (isset($_GET['un']) && !empty($_GET['un'])) {
	
	$user_id = get_unid($_GET['un']);
	$users = get_users($user_id);
 
    if (empty($users)) {
      $page_title = 'Page Not Found';
    } else {
	  foreach ($users as $user) {
		  $page_title = $user['fullname'];
		  $meta_description = $user['fullname'].' is using Teloslist. Are you?';
		}	
    } 

} else {
	$page_title = 'Page Not Found';  
}

$page_title .= ' &bull; Teloslist';

include '../djajamarsum/template/header.php';
?>

<div id="main2">

<?php
// ------ Profile ------
$include = '../djajamarsum/profile/';

if (isset($_GET['un']) && !empty($_GET['un'])) {
	
	if (isset($_GET['re']) && !empty($_GET['re'])) {
		
		if ($_GET['re'] == 'dreams' || $_GET['re'] == 'goals' || $_GET['re'] == 'accomplishments' || $_GET['re'] == 'likes' || $_GET['re'] == 'supporting' || $_GET['re'] == 'supporters' || $_GET['re'] == 'block') {
			
			if ($_GET['re'] == 'block' && (!logged_in() || $user_id != logged_in()) ) {
				include $include.'pnf.php';
			} else {
				include $include.'pp.php';	
			}
			
		} else {
			include $include.'pnf.php';
		}
			
	} else {
		include $include.'pp.php';
	}
	
} else {
	include $include.'pnf.php';	
}	
?>

</div>

<div id="main3a">
<?php
if (isset($_GET['un']) && !empty($_GET['un'])) {
	
	if (isset($_GET['re']) && !empty($_GET['re'])) {
		if ($_GET['re'] == 'dreams' || $_GET['re'] == 'goals' || $_GET['re'] == 'accomplishments' || $_GET['re'] == 'likes') {
			include $include.'pp2.php';
		} else if ($_GET['re'] == 'supporting' || $_GET['re'] == 'supporters' || $_GET['re'] == 'block') {
			include $include.'pp3.php';
		}
	} else {
		include $include.'pp2.php';
	}
}
?>
</div>

<?php
include '../djajamarsum/template/footer.php';
?>