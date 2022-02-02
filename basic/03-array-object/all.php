<?php
echo "Exercise 1 \n";
$integers = [
	$a = 3,
	$b = 4,
	$c = 5
];
echo ($a + $b + $c);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 2 \n";
$person = [
	"name" => "John",
	"surname" => "Doe",
	"age" => 50
];
var_dump($person);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 3 \n";
$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->surname = 50;
var_dump($person);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 4 \n";
$items = [
	[
		[
			"name" => "John",
			"surname" => "Doe",
			"age" => 50
		],
		[
			"name" => "Jane",
			"surname" => "Doe",
			"age" => 41
		]
	]
];
echo $items[0][1][name] . " " . $items[0][1][surname] . " " . $items[0][1][age];
echo "\n";
echo "Exercise 5 \n"; // ==/==/==/==/==/==/==/==/
echo $items[0][0][name] . " & " . $items[0][1][name] . " " . $items[0][1][surname] . "`s";
