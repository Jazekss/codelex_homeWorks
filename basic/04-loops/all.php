<?php
echo "Exercise 1: \n";
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($arr as &$value) {
	echo $value;
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 2: \n";
for ($x = 0; $x <= 10; $x++) {
	echo "Numbers: $x \n";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 3: ";
for ($x = 0; $x < 10; $x++) {
	echo "Codelex\n";
}
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 4: \n";
$array = [2, 3, 6, 8, 9, 15, 20];
for ($i = 0; $i <= count($array); $i++){
	if($array[$i] % 3 == 0){
		echo $array[$i] . "\n";
	}
}
echo "\n"; // ==/==/==/==/==/==/==/==/
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