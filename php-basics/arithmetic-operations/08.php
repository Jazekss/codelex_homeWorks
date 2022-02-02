<?php
echo "Exercise #8 : \n";
function payout($num){
	if ($num > 60) {
		echo "This will throw an error (working hours over 60)";
	} elseif ($num > 40){
		$payH = ($num - 40) * 12;
		$payHu = 40 * 8 + $payH;
		echo "for {$num}hours payout will be: " . $payHu . "€";
	}
}
$workingHours = readline('Enter working hours: ');

payout($workingHours);