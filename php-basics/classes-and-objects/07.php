<?php
class Dog
{
	private string $name;
	private string $sex;
	private array $parents;
	public function __construct(string $name, string $sex){
		$this->name = $name;
		$this->sex = $sex;
	}
	public function setParens(){

	}
}
class DogsTest extends Dog
{
	public function getName(string $name){
		return $this->name;
	}
	public function getSex(string $sex){
		return $sex;
	}
}
$dogs = new DogsTest;
$max = new Dog("Max", "male");
$rocky = new Dog("Rocky", "male");
$sparky = new Dog("Sparky", "male");
$buster = new Dog("Buster", "male");
$sam = new Dog("Sam", "male");
$lady = new Dog("Lady", "female");
$molly = new Dog("Molly", "female");


die;

foreach($dog->getName() as $index => $product){
	echo "= [{$index}] {$dog->getName()} - {$dog->getSex()}\n";
}