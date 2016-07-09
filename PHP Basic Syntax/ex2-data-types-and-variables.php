<?php
// Each variable started by dollar sign - '$'
$bool   = True; // A boolean variable
$int    = 1234; // An integer variable
$float  = 1.23; // A floating point number variable
$string = "Ha"; // A string variable

// Use the built-in function array() to define arrays
$arr1   = array(10, "20", 40.5, 80, False); // An array with no keys
$arr2   = array(
	False => True,
	33 => "Tony",
	"A" => 33.06,
	6.32 => array(1, 2, 3, 4, 5),
); // An array with keys

// With no keys, call the items in the array with the index, start with 0
echo $arr1[0];
echo "\n";
echo $arr1[1];
echo "\n";
echo $arr1[2];
echo "\n";
echo $arr1[3];
echo "\n";

// If the array has specified keys, call the items by them
echo $arr2[False];
echo "\n";
echo $arr2[33];
echo "\n";
echo $arr2["A"];
echo "\n";
echo serialize($arr2[6.32]); // The function serialize() converts array to string
echo "\n";
echo implode(",", $arr2[6.32]); // Or use the function implode() to have alternative conversion

?>
