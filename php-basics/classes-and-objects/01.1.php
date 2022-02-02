<?php
class Cars {
	public string $brand;
	public string $model;
	public int $available;
	public function __construct(string $brand, string $model, int $available) {
		$this->brand = $brand;
		$this->model = $model;
		$this->available = $available;
	}
	public function getBrand(): string {
		return $this->brand;
	}
	public function getModel(): string {
		return $this->model;
	}
}
class CarSalon {
	public array $carSalon = [];
	public function rentCar(Cars $carSalon): Cars	{
		return $this->carSalon[] = $carSalon;
	}
	public function isAvailable(): int	{
		foreach ($this->carSalon as $rent) {
			$available = $rent->available;
		}
		return $available;
	}
	public function countCars(): int	{
		foreach ($this->carSalon as $rent) {
			$count = count($rent->available);
		}
		return $count;
	}
}
$nissan = new Cars('Nissan', 'X-Trail', '0');
$honda = new Cars('Honda', 'CRW', '1');
$ford = new Cars('Ford', 'C-Max', '1');

$rent = [];
$rent = new CarSalon();

$rent->rentCar($nissan);
$rent->rentCar($honda);
$rent->rentCar($ford);

foreach($rent as $cars){
	foreach($cars as $car) {
		$i=0;
		foreach ($car as $key => $value){
			$car->brand[$i] . PHP_EOL;
			$car->model[$i] . PHP_EOL;
			$car->available[$i] . PHP_EOL;
			$i++;
		}

	}
}
$count = count($car->brand);
echo $car->brand . PHP_EOL;
echo $car->model . PHP_EOL;
echo $car->available . PHP_EOL;

while(true) {
	echo "[1] See available cars\n";
	echo "[2] Rent a car\n";
	echo "[Any] Exit carSalon\n";
	$options = (int) readline("Choose: ");
	if($options == 1){
		$i = 1;
		foreach($rent as $car){
			echo "Record №{$i}/ Name: {$car->Cars()}\n";
			$i++;
		}

	}elseif($options == 2){
		echo "Option 2";

	}else{
		exit;
	}
}