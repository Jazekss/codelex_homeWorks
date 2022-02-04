<?php
class Dog
{
	private string $name;
	private string $sex;
	private string $mother;
	private string $father;
	public function __construct(string $name, string $sex, string $mother = "Unknown", string $father = "Unknown"){
		$this->name = $name;
		$this->sex = $sex;
		$this->mother = $mother;
		$this->father = $father;
	}
	public function getName(): string{
		return $this->name;
	}
	public function getSex(): string{
		return $this->sex;
	}
	public function getMother(): string{
		return $this->mother;
	}
	public function getFather(): string {
		return $this->father;
	}
}
class DogsTest
{
	private array $dogs;
	public function __construct( array $dogs){
		$this->dogs = $dogs;
	}
	public function isMother(Dog $dogs): bool {
		if ($dogs->getMother() === $dogs->getMother()) {
			return true;
		} else {
			return false;
		}
	}
}
$dogs[] = new Dog("Max", "male", "Lady", "Rocky");
$dogs[] = new Dog("Rocky", "male", "Molly", "Sam");
$dogs[] = new Dog("Sparky", "male");
$dogs[] = new Dog("Buster", "male", "Lady", "Rocky");
$dogs[] = new Dog("Sam", "male");
$dogs[] = new Dog("Lady", "female");
$dogs[] = new Dog("Molly", "female");
$dogs[] = new Dog("Coco", "female", "Lady", "Rocky");

foreach($dogs as $dog){
	echo "\e[0;32m{$dog->getName()}\e[0m has mother \e[0;32m{$dog->getMother()}\e[0m and father \e[0;32m{$dog->getFather()}\e[0m \n";
}
echo "Dogs has same mothers: ";
foreach($dogs as $index => $dog){
	$same[$index] = $dog->getMother();
	$same2[$index] = $dog->getMother();
	if($same[$index] == $same2[$index]){
		echo "{$same[$index]} \n";
	}
}
