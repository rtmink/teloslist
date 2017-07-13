<?php
/*for ($i = 1, $x = 0; $i <= 1000000; $i++)
{
	$x += 1 / ($i * $i);
}

echo $x;*/

function sq($v, $n){	

	if ($n == 0)
		$z = 1;
	else
		$z = $v;
		
	for ($i = 1; $i < $n; $i++)
	{
		$z *= $v;
	}
	
	return $z;
}

for ($i = 0, $y = 0; $i <= 50; $i++)
{
	$y += (1 / (4 * (sq(2, $i))));
}

echo $y;
//echo sq(6, 0);
?>