<?php
echo "Exercise 5: \n";
$persons = [
	[
		[
			"name" => "John",
			"surname" => "Doe",
			"age" => 28,
			"birthday" => "1993.03.03"
		],
		[
			"name" => "Jane",
			"surname" => "Doe",
			"age" => 26,
			"birthday" => "1995.01.01"
		]
	]
];
foreach ($persons as $person){
	//print_r($person);
	echo "<br>";
	foreach ($person as $key){
		echo "Birthday: " . $key["birthday"]. " and age: " . $key["age"] . "<br>";
	}
}