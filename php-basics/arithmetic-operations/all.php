<?php
echo "Exercise #1 : \n";
$a = 12;
$b = 3;
if ($a == 15 || $b == 15 || $a + $b == 15 || $a - $b == 15){
	echo "True";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #2 : \n";
function CheckOddEven($num){
	print_r("Number {$num} is ");
	if ($num % 2 == 0){
		print_r("Even Number");
	} else {
		print_r("Odd Number");
	}
	print_r(", bye!");
}
CheckOddEven(4);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #3 : \n";
$result = 0;
for ($i = 1; $i <= 100; $i++){
	$result = $result + $i;
	echo "Result: " . $result . "\n ";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #4 : \n";
$result = 1;
for ($i = 1; $i <= 10; $i++){
	$result = $result * $i;
}
echo "Product of integers from 1 to 10 is $result";
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #5 : \n";
echo "I'm thinking of a number between 1-100. \n";
$random = rand(1, 100);
$guess = readline('Guess:');
if ($random == $guess){
	echo "You guessed it!  What are the odds?!?";
} else {
	if($random > $guess){
		echo "Sorry, you are too low.  I was thinking of $random.";
	} else {
		echo "Sorry, you are too high.  I was thinking of $random.";
	}
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #6 : \n";
$num = 110;
for ($i = 1; $i <= $num; $i++) {
	if ($i % 12 == 0) {
		echo "\n";
	}elseif ($i % 3 == 0) {
		echo " Coza ";
	} elseif ($i % 5 == 0) {
		echo " Loza ";
	} elseif ($i & 7 == 0) {
		echo " Woza ";
	} elseif ($i % 3 == 0 || $i % 5 == 0) {
		echo " CozaLoza ";
	} else {
		echo " {$i} ";
	}
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #7 : \n";
$a = -9.81;
$t = 10;
$at2 = $a * pow($t, 2);
echo "Position of an object after falling for 10 seconds\n";
echo "x(t) = 0.5 * at²: " . 0.5 * $at2 . "m";
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #8 : \n";
function payout($num){
	if ($num > 60) {
		echo "This will throw an error (working hours over 60)";
	} elseif ($num > 40){
		$payH = ($num - 40) * 12;
		$payHu = 40 * 8 + $payH;
		echo "for {$num}hours payout will be: " . $payHu . "€";
	}
}
$workingHours = readline('Enter working hours: ');

payout($workingHours);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise #9 : \n";
$weight = (int)readline('Enter your weight (in kg): ') * 2.2046;
$height = (int)readline('Enter your height (in cm): ') * 0.3937;
function bmi ($w, $h){
	echo "Weight: {$w} and Height: {$h} \n";
	return ($w * 703) / pow($h, 2);
}
echo bmi($weight, $height);
echo "\n"; // ==/==/==/==/==/==/==/==/
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