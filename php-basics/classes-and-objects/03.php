<?php
class FuelTank
{
	public int $fuelAmount;
	private int $fuelCapacity = 70;
	public function __construct(int $fuelAmount){
		$this->fuelAmount = $fuelAmount;
	}
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
}
class Odometer extends FuelTank
{
	private string $fuel;
	public function kmPerLiter( object $fuelTank): int{
		$perLiter = $fuelTank->getFuelAmount() * 10;
		return $this->perLiter = $perLiter * 10;
	}
}
$fuelTank = new FuelTank(35);
echo "Your car fuel tank capacity is 70l, there is {$fuelTank->getFuelAmount()}l of fuel\n";
$fuelTank->addFuel(readline('Add liters of fuel:'));
//echo $fuelAmount;
echo "You have " . $fuelTank->getFuelAmount() . "l of fuel, ready to go\n";
sleep(1);
$fuelTank = new Odometer($fuelTank->getFuelAmount());
echo "You drive {$fuelTank->kmPerLiter($fuelTank)}km with {$fuelTank->getFuelAmount()}l of fuel\n";
