<?php
echo "Exercise 6: \n";
$array = array(2, 5, 8, 9.2, 'Ten');
//pr(count($array));
function double ($arr){
	$counter = count($arr);
	echo $counter . " <br>";
	for ($i = 0; $i <= $counter - 1; $i++){
		if(is_integer($arr[$i])){
		echo $arr[$i] * 2 . " - is integer (before doubling {$arr[$i]}) <br>";
		} elseif(is_float($arr[$i])) {
			echo $arr[$i] . " - is float <br>";
		} else{
			echo $arr[$i] . " - is string <br>";
		}
	}
}
double($array);