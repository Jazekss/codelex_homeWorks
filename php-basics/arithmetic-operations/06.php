<?php
echo "Exercise #6 : \n";
$num = 110;
for ($i = 1; $i <= $num; $i++) {
	if ($i % 12 == 0) {
		echo "\n";
	}elseif ($i % 3 == 0) {
		echo " Coza ";
	} elseif ($i % 5 == 0) {
		echo " Loza ";
	} elseif ($i & 7 == 0) {
		echo " Woza ";
	} elseif ($i % 3 == 0 || $i % 5 == 0) {
		echo " CozaLoza ";
	} else {
		echo " {$i} ";
	}
}