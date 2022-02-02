<?php
echo "Exercise #7 : \n";
$a = -9.81;
$t = 10;
$at2 = $a * pow($t, 2);
echo "Position of an object after falling for 10 seconds\n";
echo "x(t) = 0.5 * at²: " . 0.5 * $at2 . "m";