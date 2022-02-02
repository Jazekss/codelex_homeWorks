<?php
echo "Exercise #2 : ";
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