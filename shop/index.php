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

echo "  ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
echo "  ┃ \e[0;32m{$person->name} has [ {$person->cash}$ ]\e[0m\n";

if(file_exists('cart.txt')) {
	$shoppingCart = explode(',', file_get_contents('cart.txt'));
}

while (true) {
	$totalSum = 0;
	echo "  ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
	echo "  ┣━ \e[1;32m Virtu-market\e[0m\n";
	echo "  ┃ [1]\e[0;32m Choose product\e[0m\n";
	echo "  ┃ [2]\e[0;32m Checkout\e[0m\n";
	echo "  ┃ [X]\e[0;32m Quit\e[0m\n";
	$option = (int)readline("  ┃ Select an option: ");
	echo "  ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
	switch ($option) {
		// ===== CASE 2 =====
		case 1:
			echo "  ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
			foreach ($products as $index => $product) {
				echo "  ┃ [{$index}] \e[34m{$product->name}\e[0m {$product->description})- \e[1;34m{$product->price}€\e[0m / \e[1;33m{$product->countAll}\e[0m\n";
			}
			$selectedProductIndex = (int)readline('  ┃ Select product: ');

			$product = $products[$selectedProductIndex] ?? null;

			if ($products === null) {
				echo "  ┃	Product not found\n";
				exit;
			}
			if ($product->price > $person->cash) {
				echo "  ┃	Not enough cash.\n";
				exit;
			}
			$shoppingCart[] = $product;

			echo "  ┃ Added {$product->name} to basket.\n";
			break;
		// ===== CASE 2 =====
		case 2:
			if(isset($shoppingCart)){
				echo "  ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
				echo "  ┣━ Items in cart:\n";
			}

			foreach ($shoppingCart as $product) {
				$totalSum += $product->price;
				if($product->name === null) {
					echo "  ┃	Your shopping cart is empty\n";
					echo "  ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
					echo "  ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
				} else {
					if ($person->cash >= $totalSum) {
						echo "  ┃	{$product->name} - {$product->price}€\n";
						$person->cash -= $totalSum;
					}else{
						echo "  ┃	Payment failed, Not enough cash\n";
						echo "  ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
					}
				}
			}
			echo "  ┣━ Total: [  {$totalSum}€  ]\n";
			echo "  ┃	Successful payment.\n";
			echo "  ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┅┉┉\n";
			//unlink('cart.txt');
			break;
		default:
			$productsIndexes = implode(',', $shoppingCart);
			file_put_contents('cart.txt', $productsIndexes);
			exit;
	}
}