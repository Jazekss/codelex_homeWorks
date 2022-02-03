<?php
class Product
{
	private string $name;
	private float $price;
	private int $amount;
	public function __construct(string $name, float $price, int $amount){
		$this->name = $name;
		$this->price = $price;
		$this->amount = $amount;
	}
	public function getName(): string {
		return $this->name;
	}
	public function getPrice(): float {
		$price = $this->price;
		return number_format($price, 4);
	}
	public function getAmount(): int {
		return $this->amount;
	}
	public function changePrice(float $newPrice){
		return $this->price = $newPrice;
	}
	public function changeAmount(int $newAmount){
		return $this->amount = $newAmount;
	}
}
class Change
{
	private array $products = [];
	public function addProduct(Product $products): void {
		$this->products[] = $products;
	}
	public function getProducts(): array {
		return $this->products;
	}
}

$products = new Change();
$mouse = new Product("Logitech mouse", 70.00, 14, 0);
$products->addProduct($mouse);
$iphone = new Product("iPhone 5s", 999.99, 3, 0);
$products->addProduct($iphone);
$epson = new Product("Epson EB-U05", 440.46, 1, 0);
$products->addProduct($epson);

while(true) {
	echo "=========== List of all products. ============\n";
	foreach($products->getProducts() as $index => $product){
		echo "=== [{$index}] {$product->getName()} price {$product->getPrice()} (amount: {$product->getAmount()}) \n";
	}
	echo "==============================================\n";
	echo "=== [1] Change price === [2] Change amount ===\n";
	$options = (int) readline("Choose: ");
	if($options == 1) {
		echo "=== Change price ===\n";
		foreach ($products->getProducts() as $index => $product) {
			echo "=== [{$index}] {$product->getName()} {$product->getPrice()}$\n";
		}
		echo "===\n";
		foreach ($products->getProducts() as $index => $product) {
//			$index = (int) readline("Choose: ");
			echo "=== [{$index}] {$product->getName()} {$product->getPrice()}$\n";
			$newPrice = readline("Enter new price: ");
			$product->changePrice($newPrice);
		}
	}elseif($options == 2){
		echo "=== Change amount ===\n";

		foreach ($products->getProducts() as $index => $product) {
			echo "=== [{$index}] {$product->getName()} {$product->getAmount()}$\n";
		}
		echo "===\n";
		foreach ($products->getProducts() as $index => $product) {
//			$index = (int) readline("Choose: ");
			echo "=== [{$index}] {$product->getName()} {$product->getAmount()}$\n";
			$newAmount = readline("Enter new amount: ");
			$product->changeAmount($newAmount);
		}
	}else{
		break;
	}
}