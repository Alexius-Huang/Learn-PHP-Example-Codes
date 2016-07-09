<?php
echo "\n";

class Car {
	private $name;
	private $color;

	function setName($new_name){
		$this->name = $new_name;
	}

	function setColor($new_color){
		$this->color = $new_color;
	}

	function getName(){
		echo "The name of the car is ".$this->name."\n";
	}

	function getColor(){
		echo "The color of the car is ".$this->color."\n";
	}

	function show(){
		echo "Car : { name : ".$this->name." ; color : ".$this->color." }"."\n";
	}
}

$red_car = new Car;

$red_car -> setName("Farari");
$red_car -> setColor("Red");

$red_car -> getName();
$red_car -> getColor();
$red_car -> show();
	
?>
