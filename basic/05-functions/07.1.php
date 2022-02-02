<?php

$person = new stdClass();
$person->name = readline('Enter your name: ');
$person->cash = (int)readline('Enter your balance: ');
$person->licenses = readline('Enter your licenses (A, B, C): ');
$personLicense[] = $person->licenses;
function createWeapon(string $name, int $price, string $license = null): stdClass {
	$weapon = new stdClass();
	$weapon->name = $name;
	$weapon->license = $license;
	$weapon->price = $price;
	return $weapon;
}

$weapons = [
	createWeapon('AK47', 1000, 'C'),
	createWeapon('Deagle', 500, 'A'),
	createWeapon('Knife', 100 )
];

$shoppingCart[] = '';

echo "\e[0;32m{$person->name} has {$person->cash}$ and licenses: {$person->licenses}\e[0m\n";

foreach ($weapons as $index => $weapon){
	echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$\n";
}

$cheapest = array_column($weapons, 'price');

while ($person->cash > min($cheapest)) {

	$selectedWeaponIndex = (int)readline('Select weapon: ');

	$weapon = $weapons[$selectedWeaponIndex] ?? null;

	if ($weapons === null) {
		echo "Weapon not found\n";
		exit;
	}

	if ($selectedWeaponIndex > $index) {
		echo "This weapons doesnt exist.\n";
		exit;
	}

	if ($weapon->license !== null && !in_array($weapon->license, $personLicense)) {
		echo "Invalid license.\n";
		exit;
	}

	if ($person->cash <= $weapon->price) {
		echo "Not enough cash.\n";
		exit;
	}
	$person->cash -= $weapon->price;
	echo "{$person->name} has left with {$person->cash}$\n";

	array_push($shoppingCart, $weapon->name);

	echo "Purchased {$weapon->name}, {$person->name} balance is {$person->cash}\n";

	function cart ($arr){
		for ($i = 0; $i = count($arr)-1; $i++){
			echo $arr[$i];

		}
		return $arr;
	}
	echo "Shoppingcart: " . cart($shoppingCart) . "\n";

	echo "Want to buy more?\n";

	echo (int)readline('Press ENTER');

	foreach ($weapons as $index => $weapon){
		echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$\n";
	}

}



