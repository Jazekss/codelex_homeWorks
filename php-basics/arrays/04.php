<?php
echo "Exercise #4: \n";
$random = array();
for ($i = 0; $i < 10; $i++) {
	$random[] = rand(1, 100);
}
$random2 = $random;
echo "Array 1: ";
$random[] = array_pop($random) . array_push($random, -7);
for ($f = 0; $f < 10; $f++){
	echo "[{$f}]: {$random[$f]} | ";
}
echo "\nArray 2: ";
for ($s = 0; $s < 10; $s++){
	echo "[{$s}]: {$random2[$s]} | ";
}