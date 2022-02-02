<?php
echo "Exercise #10 : \n";
while(true){
	echo "\e[0;32m Geometry Calculator \e[0m\n";
	echo "[1] Calculate the Area of a Circle\n";
	echo "[2] Calculate the Area of a Rectangle\n";
	echo "[3] Calculate the Area of a Triangle\n";
	echo "[4] Quit\n";
	$option = (int) readline("Select an option: ");
	switch($option){
		case 1:
			$circleArea = pi() * readline("Enter radius: ");
			echo "\e[1;32m Area of a circle is {$circleArea} \e[0m\n";
			break;
		case 2:
			$rectangleH = readline("Enter height: ");
			$rectangleW = readline("Enter width: ");
			$rectangleArea = $rectangleH * $rectangleW;
			echo "\e[1;32m Area of rectangle is {$rectangleArea} \e[0m\n";
			break;
		case 3:
			$triangleH = readline("Enter height: ");
			$triangleW = readline("Enter width: ");
			$triangle3rd = readline("Enter 3rd side: ");
			$triangleArea = ($triangleH * $triangleW * $triangle3rd) / 2;
			echo "\e[1;32m Area of rectangle is {$triangleArea} \e[0m\n";
			break;
		default:
			exit;
	}
}