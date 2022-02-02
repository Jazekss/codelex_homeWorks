<?php
class Animal
{
	protected static int $number = 10;
	private static function additionalNumber(): int {
		return 200;
	}
}
class Ape extends Animal{
	public static function number(): int{
		return parent::$number + parent::additionalNumber();
	}
}
echo Ape::$number;


//class Person
//{
//	public static $name = "Jānis";
//	public static function setName(){
//		self::$name = $name;
//	}
//	public static function hello(): string {
//		return "world";
//	}
//	public static function name(): string {
//		return self::$name;
////		return static::$name; <- Tikai šīs klases ietvaros
////		return Person::$name; <- Tikai šīs klases ietvaros
//	}
//}
//echo Person::name() . PHP_EOL;
//echo Person::hello() . PHP_EOL;
//$a = new Person;
//$a::setName('Ilze');
//echo $a::name();