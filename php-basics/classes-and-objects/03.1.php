<?php
class FuelGauge
{
	private float $fuel = 0;
	private const FUEL_CAPACITY = 70;

	public function __construct(float $amount){
		$this->change($amount);
	}
	public function change(float $amount): void	{
		$this->fuel += $amount;

		if ($this->fuel > self::FUEL_CAPACITY){
			$this->fuel = self::FUEL_CAPACITY;
		}

		if ($this->fuel < 0) {
			$this->fuel = 0;
		}
	}

	public function getFuel(): float
	{
		return $this->fuel;
	}
}

class Odometer
{
	private int $mileage = 0;

	public function getMileage()
	{
		return $this->mileage;
	}

	public function addMileage(int $amount)
	{
		$this->mileage += $amount;
	}
}


class Car
{
	private string $name;
	private FuelGauge $fuelGauge;
	private Odometer $odometer;

	private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km

	private const TIRE_QUALITY_LOSE_PER_KM = [1, 2];
	private array $tires;

	public function __construct(string $name, int $fuelGaugeAmount)
	{
		$this->name = $name;
		$this->fuelGauge = new FuelGauge($fuelGaugeAmount);
		$this->odometer = new Odometer();
		$this->tires = [
			new Tire("Front left"),
			new Tire("Front right"),
			new Tire("Back left"),
			new Tire("Back right")
		];
	}

	public function drive(int $distance = 10): void	{
		if ($this->fuelGauge->getFuel() <= 0) return;

		$this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
		$this->odometer->addMileage($distance);
		[$minQualityLoss, $maxQualityLoss] = self::TIRE_QUALITY_LOSE_PER_KM;
		foreach ($this->tires as $tire){
			$tire->changeCondition(rand($minQualityLoss * $distance, $maxQualityLoss * $distance));
		}
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getFuel(): float
	{
		return $this->fuelGauge->getFuel();
	}

	public function getMileage(): int
	{
		return $this->odometer->getMileage();
	}
	public function hasValidTires(): bool {
		$brokerTires = [];
		foreach ($this->tires as $tire){
			if($tire->getCondition() <= 0){
//				$brokerTires[] = $tire;
				return false;
			}
		}
		return count($brokerTires) <= 2;
	}
	public function getTires(): array{
		return $this->tires;
	}
}

class Tire
{
	private string $name;
	private int $condition;
	public function __construct(string $name, int $condition = 100){
		$this->name = $name;
		$this->condition = $condition;
	}
	public function  changeCondition(int $percent): void{
		$this->condition -= $percent;
	}
	public function getCondition(): int{
		return $this->condition;
	}
	public function getName(): string {
		return $this->name;
	}
}

$name = readline('Car name: ');
$fuelGaugeAmount = (int) readline('Fuel Gauge amount: ');
$driveDistance = (int) readline('Drive distance: ');

$car = new Car($name, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

while ($car->getFuel() > 0 || $car->hasValidTires()) {
	echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
	echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
	foreach ($car->getTires() as $tire){
		echo "Tire ({$tire->getName()}): " . $tire->getCondition() . "%\n";
	}
	$car->drive($driveDistance);

	sleep(1);
}