<?php
$value = 2;

$value = abs($value);
$guess = $value / 2;
for ($i = 0; $i < 10; $i++) {
	$guess = 0.5 * ($guess + ($value / $guess));	
}

echo $guess;

echo <<<A
	<p>Hello!</p>	
A
?>