<?php
echo "Exercise 1: \n";
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];
//todo
echo "Original numeric array: ";

foreach ($numbers as $number){
	echo "$number \n";
}
//todo
echo "Sorted numeric array: $sorted";
sort($numbers);
foreach ($numbers as $number){
	echo "$number \n";
}
$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];
//todo
echo "Original numeric array: ";
foreach ($words as $word){
	echo "$word \n";
}
//todo
echo "\n Sorted string array: ";
sort($words);
foreach ($words as $word){
	echo "$word \n";
}