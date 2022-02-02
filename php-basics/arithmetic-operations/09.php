<?php
echo "Exercise #9 : \n";
$weight = (int)readline('Enter your weight (in kg): ') * 2.2046;
$height = (int)readline('Enter your height (in cm): ') * 0.3937;
function bmi ($w, $h){
	echo "Weight: {$w} and Height: {$h} \n";
	return ($w * 703) / pow($h, 2);
}
echo bmi($weight, $height);