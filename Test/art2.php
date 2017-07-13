<?php 
include 'djajamarsum/has_ie_ratu/hasieratu.php';

$page_title = 'ARTH 54 Study Guide &bull; Teloslist';

include 'djajamarsum/template/header.php';

if (isset($_POST['art_artist'], $_POST['art_title'], $_POST['art_year'])) {
	$artist = check_values($_POST['art_artist']);
	$title = check_values($_POST['art_title']);
	$year = check_values($_POST['art_year']);
	
	mysql_query("INSERT INTO `art_project` VALUES ('', '$artist', '$title', '$year')");
	mysql_insert_id(); 
	
	echo 'done';
}

/*for ($i = 36; $i >= 23; $i--) {
	$nuId = $i + 1;
	mysql_query("UPDATE `art_project` SET `art_id`='$nuId' WHERE `art_id`='$i'");
}*/
?>

<div id="main2">
	<form action="" method="post">
        <input type="text" name="art_artist" /><br />
        <input type="text" name="art_title" /><br />
        <input type="text" name="art_year" /><br />
        <input type="submit" class="button" />
    </form>
</div>

<?php
include 'djajamarsum/template/footer.php';
?>

<script>
	/*if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    	var xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
    	var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }*/
	//xmlhttp.send();
	var ajaxDisplay = document.getElementById('displayList');
	
	try { //for Firefox, Chrome, Opera, Safari, IE7+
		var activeX = new XMLHttpRequest(); //initializing object
	} catch(e) {
		try{ // for IE5 , IE6
			var activeX = new ActiveXObject(Msxml2.XMLHTTP);
		}
		catch(e) {
			alert("Dude your browser is in Jurassic era!");
		}
	}
	
	activeX.onreadystatechange = function() {
		if (activeX.readyState == 4) {
			var queryResult = activeX.responseText;
		
			if(!queryResult){
				ajaxDisplay.innerHTML = 'Error in populating list';
			} else {
				ajaxDisplay.innerHTML = queryResult;
			}	
		}
	}
	var requestString = "?to="+document.getElementById('usernum').value;
	activeX.open("GET", "ajax-userlist.php"+requestString, true);
	activeX.send(null);
</script>

<!-- My Baby -->

<script>
// ==ClosureCompiler==
// @output_file_name default.js
// @compilation_level SIMPLE_OPTIMIZATIONS
// ==/ClosureCompiler==

var img = new Array()
var randNumArray = [];
var maxNum = 71;
	
$(document).ready(function() {
	$(window).load(function() {
		hide('#art_infoBox');
		for (var i = 1; i <= maxNum; i++)
			img[i] = i;	
		start();
	});
});

function show(what) {
	$(what).show();	
}

function hide(what) {
	$(what).hide();	
}

function toggle(what) {
	$(what).toggle();	
}
			
function randImg() {
	if (randNumArray != 0) {
		hide('#artH1');
		hide('#art_infoBox');
		var randNo = Math.floor(Math.random() * (randNumArray.length - 1));
		var imgId = randNumArray[randNo];
		$('img#artImg').attr("src", '/xxx/img/ARTH54/' + img[imgId] + '.jpg');
		//append(imgId);
		getInfo(imgId);
		randNumArray.splice(randNo, 1);
		if (randNumArray == 0) {
			//alert('All 71 images have been shown. Click "Start Over" to generate a new set of randomized images, then click "Show Image" to show the first random image.');
			show('#artH1');
			document.getElementById("artH1span").innerHTML = "All 71 images have been shown. Click \"Start Over\" to generate a new set of randomized images, then click \"Show Image\" to show the first random image.";
		}
	}
	else {
		alert('All 71 images have been shown. Click "Start Over" to generate a new set of randomized images, then click "Show Image" to show the first random image.');
	}
}

function start() {
	for (var x = 0; x < maxNum; x++)
		randNumArray[x] = [x + 1]
}

function startOver() {
	start();
	show('#artH1');
	document.getElementById("artH1span").innerHTML = "Images randomized. Click \"Show Image\" to show the first random image.";
	alert('Images randomized. Click "Show Image" to show the first random image.');
}

function getInfo(id) {
	art_id = id;
	try { 
		var xmlhttp = new XMLHttpRequest();
	} catch(e) {
		try{
			var xmlhttp = new ActiveXObject(Msxml2.XMLHTTP);
		}
		catch(e) {
			alert("Dude your browser is in Jurassic era!");
		}
	}
    xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var retVal = xmlhttp.responseText;
			var retVal = retVal.split(" * ");
			document.getElementById("art_artist").innerHTML = retVal[0];
			document.getElementById("art_title").innerHTML = retVal[1];
			document.getElementById("art_year").innerHTML = retVal[2];
		}
	}
	xmlhttp.open("GET","getart.php?art_id="+art_id,true);
	xmlhttp.send(null);
}

function appendTest(array) {
	$("p").append('<b>' + array + '</b>, ');	
}
</script>