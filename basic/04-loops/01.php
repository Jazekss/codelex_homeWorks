<?php
echo "Exercise 1: \n";
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($arr as &$value) {
	echo $value;
}