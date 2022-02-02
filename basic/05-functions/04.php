<?php
echo "Exercise 4: \n";
$person = [
	"name" => "John",
	"surname" => "Johnson",
	"age" => 18
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

//Create a array of objects that uses the function of exercise 3
//but in loop printing out if the person has reached age of 18.