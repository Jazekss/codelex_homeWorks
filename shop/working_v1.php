<?php
$personData = explode(';', file_get_contents('buyer.txt'));
$person = new stdClass();
$person->name = $personData[0];
$person->cash = $personData[1];

$shoppingCart = [];

function createProducts(string $name, int $price, string $description, string $expiry, int $countAll): stdClass{
	$product = new stdClass();
	$product->name = $name;
	$product->price = $price;
	$product->description = $description;
	$product->expiry = $expiry;
	$product->countAll = $countAll;
	return $product;
}
$products = [];
if (($handle = fopen("items.csv", "r")) !== false) {
	while (($data = fgetcsv($handle, 1000, ';')) !== false) {
		[$name, $price, $description, $expiry, $countAll] = $data;
		$products[] = createProducts((string) $name, (int)$price, (string)$description, (string)$expiry, (int)$countAll  );
	}
	fclose($handle);
}

echo "\e[0;32m{$person->name} has{$person->cash}$\e[0m\n";

while (true) {
	$totalSum = 0;
	echo "\n\e[0;32m Virtu-market \e[0m\n";
	echo "[1] Choose product\n";
	echo "[2] Checkout\n";
	echo "[Any] Quit\n";
	$option = (int)readline("Select an option: ");
	switch ($option) {
		// ===== CASE 1 =====
		case 1:
			foreach ($products as $index => $product) {
				echo "[{$index}] \e[0;34m{$product->name}\e[0m {$product->description})- \e[1;34m{$product->price}€\e[0m / \e[1;33m{$product->countAll}\e[0m\n";
			}
			$selectedProductIndex = (int)readline('Select product: ');

			$product = $products[$selectedProductIndex] ?? null;

			if ($products === null) {
				echo "Product not found\n";
				exit;
			}
			if ($product->price > $person->cash) {
				echo "Not enough cash.\n";
				exit;
			}
			$shoppingCart[] = $product;

			echo "Added {$product->name} to basket.\n";
			break;
		// ===== CASE 2 =====
		case 2:
			echo "---- Items in cart:\n";
			foreach ($shoppingCart as $product) {
				$totalSum += $product->price;
				echo "{$product->name} - {$product->price}\n";

				$myCart = fopen("cart.txt", "w") or die("Unable to open file!");
				$txt = $product->name . "; ";
				fwrite($myCart, $txt);
				fclose($myCart);

			}
			echo "-------------------\n";
			echo "Total: {$totalSum}$\n";
			if ($person->cash >= $totalSum) {
				$person->cash -= $totalSum;
				echo "Successful payment.";
			} else {
				echo "Payment failed, Not enough cash";
			}
			break;
		default:
			exit;
	}
}