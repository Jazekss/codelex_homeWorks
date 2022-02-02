<?php
echo "Exercise 1 \n";
if (10 == "10") {
	echo 'Same';
} else {
	echo 'Not same';
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 2 \n";
if (50 > 1 && 50 < 100){
	echo 'Is in range';
} else {
	echo 'Not in range';
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 3 \n";
$hello = "hello";
if ($hello == "hello"){
	echo $hello . " world";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 4 \n";
if (2 == "2" && 2 !== 3 && 2 < 3){
	echo "Condition with 3 checks";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 5 \n";
$x = 40;
$y = 60;
if (50 > $x && 50 < $y){
	echo "Correct";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 6 \n";
$plateNumber = "KO5021";
switch ($plateNumber){
	case 'KO5021':
		echo "Its my car";
		break;
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 7 \n";
$number = 7;
switch ($number){
	case ($number <= 50):
		echo "low";
		break;
	case ($number >= 50):
		echo "medium";
		break;
	case ($number >= 100):
		echo "high";
		break;
}