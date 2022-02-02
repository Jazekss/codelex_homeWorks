<?php
echo "Exercise 2: \n";
$first = readline('First number: ');
$second = readline('Second number: ');
function multi ($a, $b){
	return "Result of $a * $b is " . $a * $b;
}
echo multi($first, $second);