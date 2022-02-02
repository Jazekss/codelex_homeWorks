<?php
echo "Exercise 7: \n";
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