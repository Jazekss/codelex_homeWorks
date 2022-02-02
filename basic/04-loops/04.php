<?php
echo "Exercise 4: \n";
$array = [2, 3, 6, 8, 9, 15, 20];
for ($i = 0; $i <= count($array); $i++){
	if($array[$i] % 3 == 0){
		echo $array[$i] . "\n";
	}
}

