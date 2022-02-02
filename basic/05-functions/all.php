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
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 2: \n";
$first = readline('First number: ');
$second = readline('Second number: ');
function multi ($a, $b){
	return "Result of $a * $b is " . $a * $b;
}
echo multi($first, $second);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 3: ";
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
echo pass($age);
echo "\n"; // ==/==/==/==/==/==/==/==/
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
echo pass($age);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 5: \n";
$fruits = array(
	array('fruit' => 'Grapes', 'weight' => '9'),
	array('fruit' => 'Oranges','weight' => '10'),
	array('fruit' => 'Bananas','weight' => '2'),
	array('fruit' => 'Apples','weight' => '15'),
	array('fruit' => 'Leons','weight' => '12'),
	array('fruit' => 'Peaches','weight' => '7')
);
$shipping = array('less' => 1, 'more' => 2);

function shippingPrice ($a, $b){
	foreach($a as $fruit){
		if($fruit['weight'] > 9){
			echo "{$fruit['weight']}kg of {$fruit['fruit']} shipping will cost {$b['more']}€\n";
		}else {
			echo "{$fruit['weight']}kg of {$fruit['fruit']} shipping will cost {$b['less']}€\n";
		}
	}
}
shippingPrice($fruits, $shipping);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 6: \n";
$array = array(2, 5, 8, 9.2, 'Ten');
//pr(count($array));
function double ($arr){
	$counter = count($arr);
	echo $counter . " <br>";
	for ($i = 0; $i <= $counter - 1; $i++){
		if(is_integer($arr[$i])){
		echo $arr[$i] * 2 . " - is integer (before doubling {$arr[$i]}) <br>";
		} elseif(is_float($arr[$i])) {
			echo $arr[$i] . " - is float <br>";
		} else{
			echo $arr[$i] . " - is string <br>";
		}
	}
}
double($array);
echo "\n"; // ==/==/==/==/==/==/==/==/
echo "Exercise 7: \n";
$persons = array(
	array('name' => 'John', 'lic' => array('123A'), 'cash' => '550'),
	array('name' => 'Brendon', 'lic' => array('123A', '456B'), 'cash' => '920'),
	array('name' => 'Jessica', 'lic' => array('123A', '789C'), 'cash' => '1200'),
	array('name' => 'Gerard', 'lic' => array('789C'), 'cash' => '1200')
);
$guns = array(
	array('name' => 'CCU GOVERNMENT (45ACP)', 'lic' => array('123A'), 'price' => '500'),
	array('name' => 'King Cobra Carry DAO', 'lic' => array('456B'), 'price' => '745'),
	array('name' => 'Bright Cobra (38SPL)', 'lic' => array('223D'), 'price' => '985'),
	array('name' => 'M4 CARBINE EPR (11,5")', 'lic' => array('789C'), 'price' => '1125')
);

for ($p = 0; $p <= count($persons)-1; $p++){
	for ($g = 0; $g <= count($guns)-1; $g++) {
		for ($l = 0; $l <= count($persons[$p]['lic'])-1; $l++) {
			if ($persons[$p]['lic'][$l] == $guns[$g]['lic'][0]) {
				echo "ALLOW! Person: {$persons[$p]['name']} can buy weapon  {$guns[$g]['name']}<br>\n";
			}
		}
	}
}