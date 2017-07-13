<?php
date_default_timezone_set("America/Los_angeles");
$isDate = "17 February 2010";
echo strtotime($isDate);

echo '<br/><br/>';

date_default_timezone_set("Asia/Jakarta");
$isDate = "17 February 2010";
echo strtotime($isDate);
die;

static $regions = array(
    'Africa' => DateTimeZone::AFRICA,
    'America' => DateTimeZone::AMERICA,
    'Antarctica' => DateTimeZone::ANTARCTICA,
    'Asia' => DateTimeZone::ASIA,
    'Atlantic' => DateTimeZone::ATLANTIC,
    'Australia' => DateTimeZone::AUSTRALIA,
    'Europe' => DateTimeZone::EUROPE,
    'Indian' => DateTimeZone::INDIAN,
    'Pacific' => DateTimeZone::PACIFIC
);

foreach ($regions as $name => $mask) {
    $tzlist[] = DateTimeZone::listIdentifiers($mask);
}

//print_r($tzlist);
?>
<!--<p id="demo">Click the button to display the timedifference between UTC and local time.</p>

<button onclick="myFunction()">Try it</button>

<script>
function time()
{
var d = new Date();
var x = document.getElementById("demo");
var gmt = -d.getTimezoneOffset()/60;
x.innerHTML = gmt;
}
window.load(time());
</script>

<p>Timezone: <?=date_default_timezone_get()?></p>

<p><?=gmdate('M d Y H:i:s', time() - 8*60*60);?></p>-->

