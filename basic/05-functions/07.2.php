<?php

$person = new stdClass();
$person->name = (string)readline('Enter name: ');
$person->cash = (int)readline('Enter cash: ');
$person->licenses = explode(',', readline('Enter license:'));
print_r($person->licenses);
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

echo "\e[0;32m{$person->name} has {$person->cash}$ and licenses: {$person->licenses}\e[0m\n";

$shoppingCart[] = '';

while(true){

	echo "[1] Purchase\n";
	echo "[2] Checkout\n";
	echo "[Any] Exit\n";

	$option = (int) readline("Select an option: ");

	switch($option){
		case 1:
			foreach ($weapons as $index => $weapon){
				echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$\n";
			}

			$selectedWeaponIndex = (int)readline('Select weapon: ');

			$weapon = $weapons[$selectedWeaponIndex] ?? null;

			if ($weapons === null) {
				echo "Weapon not found\n";
				exit;
			}

			if ($weapon->license !== null && !in_array($weapon->license, $person->license)) {
				echo "Invalid license.\n";
				exit;
			}

			$shoppingCart[] = $weapon;

			echo "Added {$weapon->name} to basket.\n";
			break;
		case 2:
			$totalSum = 0;
			foreach ($basket as $weapon) {
				$totalSum += $weapon->price;
				echo "{$weapon->name}\n";
			}
			echo "-------------\n";
			echo "Total: {$totalSum}$\n";
			if($person->cash >= $totalSum){
				$person->cash -= $totalSum;
				echo "Succesful payment.";
			} else  {
				echo "Payment failet, Not ennough cash";
			}
			exit;
		default:
			exit;
	}
}