<?php
// Function example
echo "\n";
echo "factorial(6) = ";
echo factorial(6)."\n";
echo "factorial(12) = ";
echo factorial(12)."\n";

function factorial($num) {
	for($result = 1, $i = 1 ; $i <= $num ; $i++ ) {
		$result *= $i;
	}
	return $result;
}
?>
