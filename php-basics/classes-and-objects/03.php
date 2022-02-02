<?php
class FuelTank
{
	public int $fuelAmount = 0;
	private int $fuelCapacity = 70;
	public function getFuelAmount(): int{
		return $this->fuelAmount;
	}
	public function addFuel(int $refill): int{
		$this->fuelAmount += $refill;
		if($this->fuelAmount >= 71){
			echo "Your fuel tank is 70l, you try to fill {$refill}\n";
			echo "Now you have {$this->fuelAmount}l of fuel, you cant drive :P\n";
			exit;
		}
		return $this->fuelAmount;
	}
	public function fuelPerKm(Odometer $odometer): void{
		$this->fuelAmount -= 1;
		$odometer->addMileage(8);
	}
}
class Odometer extends FuelTank
{
	private int $startMileage = 0;
	public function kmPerLiter(object $fuelTank): int	{
		return $perLiter = $fuelTank->getFuelAmount() * 8;
	}
}
$fuelTank = new FuelTank();
$odometer = new Odometer();

echo "Your car fuel tank capacity is 70l\n";
$filledFuel = $fuelTank->addFuel(readline('Add fuel to go:'));
echo "You have " . $fuelTank->getFuelAmount() . "l of fuel, ready to go\n";

echo "You drive {$odometer->kmPerLiter($fuelTank)}km with {$filledFuel}l of fuel /car fuel gauge is 8l/100km\n";

