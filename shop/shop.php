<?php


$person = new stdClass();
$person->name = (string)readline('Enter name: ');
$person->cash = (int)readline('Enter cash: ');

function createProduct(string $name, int $price, string $license = null): stdClass
{
	$product = new stdClass();
	$product->name = $name;
	$product->price = $price;
	return $product;
}

$products = [
	createProduct('Maizīte', 120,),
	createProduct('Kafija', 200,),
	createProduct('Limonāde', 100),
	createProduct('Piens', 120),
	createProduct('E-talons', 240),
	createProduct('Žurnāls', 250)
];

echo "\e[0;32m{$person->name} has {$person->cash}$\e[0m\n";

$shoppingCart[] = '';

while (true) {

	echo "[1] Purchase\n";
	echo "[2] Checkout\n";
	echo "[Any] Exit\n";

	$option = (int)readline("Select an option: ");

	switch ($option) {
		case 1:
			foreach ($products as $index => $product) {
				echo "[{$index}] {$product->name} {$product->price}$\n";
			}

			$selectedProductIndex = (int)readline('Select weapon: ');

			$product = $products[$selectedProductIndex] ?? null;

			if ($products === null) {
				echo "Product not found\n";
				exit;
			}


			$shoppingCart[] = $product;

			echo "Added {$product->name} to basket.\n";
			break;
		case 2:
			$totalSum = 0;
			foreach ($basket as $product) {
				$totalSum += $product->price;
				echo "{$product->name}\n";
			}
			echo "-------------\n";
			echo "Total: {$totalSum}$\n";
			if ($person->cash >= $totalSum) {
				$person->cash -= $totalSum;
				echo "Succesful payment.";
			} else {
				echo "Payment failet, Not ennough cash";
			}
			exit;
		default:
			exit;
	}
}