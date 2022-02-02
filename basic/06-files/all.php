<?php
echo "Exercise 1: \n";
$i = 2;
include '01.1.php';
echo "\n";
echo "Exercise 2: \n";
include 'include.php';
$string = "this is my string with lowercase letters";
echo upper($string) . "\n";
echo counting(3, 4);

echo "\n";
echo "Exercise 3: ";
include 'include.php';
echo counting(12, 18);
echo "\n";
echo "Exercise 4: \n";
$file = file_get_contents('ex4.txt');
echo $file;
echo "\n";
echo "Exercise 5: \n";
function createPersons(int $id, string $name, string $surname, int $age): stdClass {
	$person = new stdClass();
	$person->id = $id;
	$person->name = $name;
	$person->surname = $surname;
	$person->age = $age;
	return $person;
}
$persons = [];
if (($handle = fopen("data.csv", "r")) !== false) {
	while (($data = fgetcsv($handle, 1000, ';')) !== false) {
		[$id, $name, $surname, $age] = $data;
		$persons[] = createPersons((int)$id, (string)$name, (string)$surname, (int)$age);
	} fclose($handle);
}
echo "\e[0;35m╒═══════════════════════════════════════════════╕\e[0m\n";
echo "\e[0;35m│\e[0m \e[1;34mPerson finder \e[0m\n";
echo "\e[0;35m│\e[0m \e[1;34mEnter persons ID to find\e[0m (example  0-9)\n";
echo "\e[0;35m╘═══════════════════════════════════════════════╛\e[0m\n";
foreach ($persons as $index => $person) {
	$indexI = readline("\e[0;35m│\e[0m Persons ID:");
	$person = $persons[$indexI] ?? null;
	if ($indexI == $person->id) {
		//echo "[{$index}] {$person->name} {$person->surname} ({$person->age})\n";
		echo "\e[0;35m╒═══════════════════════════════════════════════╕\e[0m\n";
		echo "\e[0;35m│\e[0m Person with ID: [{$indexI}] FOUND!\n";
		echo "\e[0;35m│\e[0m Persons name:    {$person->name}\n";
		echo "\e[0;35m│\e[0m Persons surname: {$person->surname}\n";
		echo "\e[0;35m│\e[0m Persons age:     {$person->age}\n";
		echo "\e[0;35m╘═══════════════════════════════════════════════╛\e[0m\n";
	} else {
		echo "\e[0;35m╒═══════════════════════════════════════════════╕\e[0m\n";
		echo "\e[0;35m│\e[0m Person with id: [{$indexI}] not fount in data file\n";
		echo "\e[0;35m╘═══════════════════════════════════════════════╛\e[0m\n";
		exit;
	}
}
/* Content of include.php file
include 'functions.php';
// Content of function.php file
function upper($str):string{
	return strtoupper($str);
}
function counting ($a, $b){
	return $a + $b;
}
// Content of ex4.txt file
Jazek, Kross, 32
// Content of data.csv file
0; "James"; "Stewart"; 55;
1; "Vivian"; "Vance"; 22;
2; "Bing"; "Crosby"; 29;
3; "Marlene"; "Dietrich"; 29;
4; "Cary"; "Grant"; 33;
5; "John"; "Wayne"; 22;
6; "Myrna"; "Loy"; 38;
7; "Dean"; "Jagger"; 29;
8; "Katharine"; "Hepburn"; 45;
9; "Elsa"; "Lancheste"; 33;
*/
