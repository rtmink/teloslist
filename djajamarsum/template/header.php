<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $page_title; ?></title>
    <?php
	echo '<meta name="Description" content="';
	if (isset($meta_description)) {
		echo $meta_description;
	} else {
		echo 'The best way to share and keep track of your dreams, goals, and accomplishments.';
	}
	echo '"/>';
	?>
        
    <link href="http://localhost/xxx/css/x.css" rel="stylesheet" type="text/css">
    <!--[if IE]>
  	<link href="http://localhost/xxx/css/ie.css" rel="stylesheet" type="text/css" />
	<![endif]-->

    <script type="text/javascript" src="http://localhost/xxx/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/xxx/js/jfunc.js"></script>
    <script type="text/javascript" src="http://localhost/xxx/js/dga.js"></script>
    <script type="text/javascript">(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
   
</head>
<?php
if (isset($navHP)) {
	$cusClas = 'class="bodyHP" ';
} else if (isset($navECT)) {
	$cusClas = 'class="bodyECT" ';
} else if (isset($navSmart)) {
	$cusClas = 'class="bodySmart" ';
} else if (isset($navTour)) {
	$cusClas = 'class="bodyTour" ';
} else {
	$cusClas = '';
}

/*
if (isset($https)) {
	redirectToHTTPS();
} else {
	redirectToHTTP();
}
*/
?>
<body <?php echo $cusClas; ?> id="top">

	<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
    <span id="backToTop"><a href="#top"><span></span></a></span>
    <div id="body">
    	<?php
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
		
		if (isset($navHP)) {
        	$headerType = 'headerHP';
		} else if (isset($navECT)) {
        	$headerType = 'headerECT';
		} else if (isset($navSmart)) {
			$headerType = 'headerSmart';
		} else if (isset($navTour)) {
        	$headerType = 'headerTour';
		} else if (isset($navPro)) {
        	$headerType = 'headerPro';
		}
		if (isset($navHP) || isset($navECT) || isset($navSmart) || isset($navTour)) {
			?>
            <div id="<?php echo $headerType; ?>">
                <div class="headerX"><a href="/" title="Homepage"><span class="homepage right" id="homepageECTs"></span></a>
                    <span class="left"><?php include "$root/djajamarsum/misc/menu.php"; ?></span>				
                    <div class="clear"></div>
                </div>
             <?php
		} else if (isset($navPro)) {
			 ?>
             <div id="<?php echo $headerType; ?>">
                <div class="headerX"><a href="/" title="Homepage"><span class="homepage2 right"></span><span class="homepage right"></span></a>
                    <span class="left"><?php include "$root/djajamarsum/misc/menu.php"; ?></span>				
                    <div class="clear"></div>
                </div>
            <?php			
		} else {
			?>
            <div id="header">
                <a href="/" title="Homepage"><span class="homepage" id="homepage"></span></a>
                <span class="right"><?php include "$root/djajamarsum/misc/search_menu.php"; ?></span>
                <span class="left"><?php include "$root/djajamarsum/misc/menu.php"; ?></span>
            <?php
		}		
        ?>
        <div class="clear"></div>
        </div>
        <div id="xHeader"><?php include "$root/djajamarsum/misc/x.php"; ?></div>
        <div id-"subHeader"></div>
		
		<div id="container">
        	<div id="main">