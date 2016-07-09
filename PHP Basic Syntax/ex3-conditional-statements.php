<?php 
// The if...else... statement

$age = 15;

if ($age <= 12) {
	echo "You are just a child!";
} else if ($age <= 18) {
	echo "You are a teenager!";
} else {
	echo "You are an adult!";
}

echo "\n";

// The switch statement

$age = 8;

switch($age) {
  case 1:
  case 2:
  case 3:
  case 4:
  case 5:
  case 6:
  case 7:
  case 8:
  case 9:
  case 10:
  case 11:
  case 12:
	  echo "You are just a child!";
	  break;
  case 13:
  case 14:
  case 15:
  case 16:
  case 17:
  case 18:
	  echo "You are a teenager!";
	  break;
  default:
	  echo "You are an adult!";
}

echo "\n";

?>
