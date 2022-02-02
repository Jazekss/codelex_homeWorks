<?php
echo "Exercise 5: \n";
function createPersons(int $id, string $name, string $surname, int $age): stdClass{
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
	}
	fclose($handle);
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