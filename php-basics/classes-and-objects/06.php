<?php
$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

$numberDrinkers = ceil($surveyed * $purchased_energy_drinks);
$numberCitrus = ceil($numberDrinkers * $prefer_citrus_drinks);

function calculate_energy_drinkers(int $numberSurveyed){
	throw new LogicException(";(");
}
function calculate_prefer_citrus(int $numberSurveyed){
	throw new LogicException(";(");
}

echo "\nTotal number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . $numberDrinkers . " bought at least one energy drink\n";
echo $numberCitrus . " of those prefer citrus flavored energy drinks.";

//class Surveyed
//{
//	private $surveyed = 12467;
//	private $purchased_energy_drinks = 0.14;
//	private $prefer_citrus_drinks = 0.64;
//	public function __construct(int $surveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks){
//		$this->surveyed = $surveyed;
//		$this->purchased_energy_drinks = $purchased_energy_drinks;
//		$this->prefer_citrus_drinks = $prefer_citrus_drinks;
//	}
//	function calculate_energy_drinkers(int $numberSurveyed)
//	{
//		throw new LogicException(";(");
//	}
//
//	function calculate_prefer_citrus(int $numberSurveyed)
//	{
//		throw new LogicException(";(");
//	}
//}