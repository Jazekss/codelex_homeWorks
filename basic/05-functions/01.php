<?php
echo "Exercise 1: \n";
echo "Write a string: ";
//$string = "This is a string";
$string = readline('');
function addCodelex ($string){
	$codelex = "Codelex";
	return $string . " " . $codelex;
}
echo addCodelex($string);