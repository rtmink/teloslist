<?php 
include '../djajamarsum/has_ie_ratu/hasieratu2.php';

$page_title = 'ARTH 54 Awesome Study Guide &bull; Teloslist';
$navPro = true;

include '../djajamarsum/template/header.php';
?>

<div id="main2">
    <div class="mainArt boxShadow" id="artFrame">
        <button class="button artButton" onclick="randImg()">Show Image</button>
        <div id="artBox"><img id="artImg" src="/xxx/img/ARTH54/1.jpg" /><h1 id="artH1"><div id="artH1span">Read the Instructions on the right.</div></h1></div>
        
        <button class="button artButton" onclick="startOver()">Start Over</button>
    </div>
    <div class="mainArt boxShadow" id="artInfo">
    	<p id="art_shuffleImg">Click the button "Show Image" to show the first random image. Click it again to show the next random image.</p>
        <p id="art_startAgain">Click the button "Start Over" to generate a new set of randomized images.</p>
        <p id="art_startAgain">Click the button "Show Artwork Info" below to see the artist name, artwork title, and year it was created.</p>
        <button class="button artButton" onclick="toggle('#art_infoBox')">Show Artwork Info</button>
        <div id="art_infoBox">
            <p id="art_artist"></p>
            <p id="art_title"></p>
            <p id="art_year"></p>
        </div>
    </div>
</div>

<script>
/**
 *
 * All code (c)2012 Teloslist inc. all rights reserved
 * Copyright 2012 RyanT Mink
 */
var img=[],randNumArray=[],maxNum=71;$(document).ready(function(){$(window).load(function(){hide("#art_infoBox");for(var a=1;a<=maxNum;a++)img[a]=a;start()})});function show(a){$(a).show()}function hide(a){$(a).hide()}function toggle(a){$(a).toggle()}
function randImg(){if(0!=randNumArray){hide("#artH1");hide("#art_infoBox");var a=Math.floor(Math.random()*(randNumArray.length-1)),b=randNumArray[a];$("img#artImg").attr("src","/xxx/img/ARTH54/"+img[b]+".jpg");getInfo(b);randNumArray.splice(a,1);0==randNumArray&&(show("#artH1"),document.getElementById("artH1span").innerHTML='All 71 images have been shown. Click "Start Over" to generate a new set of randomized images, then click "Show Image" to show the first random image.')}else alert('All 71 images have been shown. Click "Start Over" to generate a new set of randomized images, then click "Show Image" to show the first random image.')}
function start(){for(var a=0;a<maxNum;a++)randNumArray[a]=[a+1]}function startOver(){start();show("#artH1");document.getElementById("artH1span").innerHTML='Images randomized. Click "Show Image" to show the first random image.';alert('Images randomized. Click "Show Image" to show the first random image.')}
function getInfo(a){art_id=a;try{var b=new XMLHttpRequest}catch(c){try{b=new ActiveXObject(Msxml2.XMLHTTP)}catch(d){alert("Dude your browser is in Jurassic era!")}}b.onreadystatechange=function(){if(4==b.readyState&&200==b.status){var a=b.responseText,a=a.split(" * ");document.getElementById("art_artist").innerHTML=a[0];document.getElementById("art_title").innerHTML=a[1];document.getElementById("art_year").innerHTML=a[2]}};b.open("GET","/projects/getart.php?art_id="+art_id,!0);b.send(null)}
function appendTest(a){$("p").append("<b>"+a+"</b>, ")};
</script>

<?php
include '../djajamarsum/template/footer.php';
?>