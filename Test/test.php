<?php
include 'djajamarsum/has_ie_ratu/hasieratu.php';

$page_title = 'Contact &bull; Teloslist';

include 'djajamarsum/template/header.php';
?>

<?php
$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
"August", "September", "October", "November", "December");
?>

<?php
if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
?>

<?php
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
?>
<table id="calendar">
<tr align="center">
<td bgcolor="#999999" style="color:#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="50%" align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Previous</a></td>
<td width="50%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Next</a>  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
<tr align="center">
<td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
</tr>
<tr>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Sunday</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Monday</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Tuesday</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Wednesday</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Thursday</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Friday</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Saturday</strong></td>
</tr>

<?php 
$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
    if(($i % 7) == 0 ) echo "<tr>n";
    if($i < $startday) echo "<td></td>n";
    else echo "<td class='cDay' align='center' valign='middle'>". ($i - $startday + 1) . "</td>n";
    if(($i % 7) == 6 ) echo "</tr>n";
}
?>

</table>
</td>
</tr>
</table>

<?php
include 'djajamarsum/template/footer.php';
?>