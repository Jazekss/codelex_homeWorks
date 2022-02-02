<?php
echo "Exercise 3: \n";
$person = [
	"name" => "John",
	"surname" => "Johnson",
	"age" => 25
];
$age = $person['age'];
function pass ($age){
	if ($age >= 18){
		return "You are old enaugh";
	} else {
		return "Too young";
	}
}
echo pass ($age);
