<?php
// The while-loop

$sum = 0;
$i = 1;
while ($i <= 10){
	$sum += $i;
	echo $sum."\n";
	$i++;
}

echo "\n";

// The for-loop
for ($j = 10, $star = "*" ; $j > 0 ; $j-- ) {
	for ($k = 1 ; $k <= $j ; $k++ ) {
		echo $star;
	}
	echo "\n";
}
echo "\n";

?>
