<?php
$players = ['[1]', '[2]', '[3]', '[4]'];
$step = '';
$playerResult = 0;
while($playerResult <= 30) {
	$start = readline("\nStart");
	if ($start === '') {
		foreach ($players as $player) {
			$random = ['1', '22', '333'];
			$rand1 = array_rand($random, 1);
			$step2 = str_repeat('-', $rand1);
			$step = $step . $step2;
			$playerResult = strlen($step);
			echo "\n$playerResult |" . $step .  $player;
			if($playerResult >= 30){
				echo " <- There is a winner";
			}
		}
	} else {
		exit;
	}
}
