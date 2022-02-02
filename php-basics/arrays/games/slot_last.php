<?php
// Choose of symbols
/** This was be idea to change even symbols in game, but this was only a dream!
 * 	$toWin1 = [' J ' => 2, ' Q ' => 5, ' K ' => 5, ' A ' => 10, ' ✦ ' => 15, ' ≛ ' => 20];
 *		$symbols1 = [' J ', ' Q ', ' K ', ' A ', ' ✦ ', ' ≛ '];
 *		$toWin2 = [' ♠ ' => 2, ' ♣ ' => 5, ' ♥ ' => 5, ' ♦ ' => 10, ' € ' => 15, ' ⁉ ' => 20];
 *		$symbols2 = [' ♠ ', ' ♣ ', ' ♥ ', ' ♦ ', ' € ', ' ⁉ ']; */
$toWin3 = ['【J】' => 2, '【Q】' => 5, '【K】' => 5, '【A】' => 10, '【#】' => 15, '【*】' => 20];
$symbols3 = ['【J】', '【Q】', '【K】', '【A】', '【#】', '【*】'];
// Field 3x3 combinations
$combinations3x3 = [
	[0, 0, 0],
	[1, 1, 1],
	[2, 2, 2],
	[0, 1, 2],
	[2, 1, 0]
];
// Field 3x5 combinations
$combinations3x5 = [
	[0, 0, 0, 0, 0],
	[1, 1, 1, 1, 1],
	[2, 2, 2, 2, 2],
	[0, 0, 1, 2, 2],
	[2, 2, 1, 0, 0],
	[0, 1, 2, 1, 0],
	[2, 1, 0, 1, 2],
	[1, 0, 0, 0, 1],
	[1, 2, 2, 2, 1],
	[1, 0, 1, 2, 1],
	[1, 2, 1, 0, 1],
];
function drawBoard(array $board): void {
	foreach ($board as $value) {
		foreach ($value as $item)
			echo "\e[0;35m{$item}\e[0m";
		echo "\n";
	}
}
$spinCost = 5;
$myCash = readline("Enter amount of money: ");
$spinCost = 1; // Default cost for spin

while(true){
	echo "\e[0;35mMoney\e[0m \e[1;35m[{$myCash}€]\e[0m \e[0;35mBet\e[0m  \e[1;35m[{$spinCost}€]\e[0m\n";
	echo "\e[1;35m[1]\e[0m \e[0;35mSpin 3x3\e[0m \e[1;35m[2]\e[0m \e[0;35mSpin 3x5\e[0m [Any] Exit\n";
	$playerChoice = readline("");
	switch ($playerChoice) {
		case 1:

			$boardRows = 3;
			$boardColumns = 3;
			$board = array_fill(0, $boardRows, array_fill(0, $boardColumns, '-'));
			$combinations = $combinations3x3;

			if ($playerWon > 0) {
				$myCash += $playerWon;
				echo "\e[0;34m You won\e[0m \e[1;34m[{$playerWon}€] \e[0m\n";
			} else {
				echo "Empty spin\n";
			}
			foreach ($board as $rowIndex => $item) {
				foreach ($item as $columnIndex => $value) {
					$board[$rowIndex][$columnIndex] = $symbols3[array_rand($symbols3)];
				}
			}
			drawBoard($board);
			$myCash -= $spinCost;
			$combinationBoard = [];
			foreach($combinations as $index => $combination) {
				foreach($combination as $r => $c) {
					$combinationBoard[$index][] = $board[$c][$r];
				}
			}
			$playerWon = 0;
			foreach ($combinationBoard as $combination) {
				if (count(array_unique($combination)) === 1) {
					$playerWon += $toWin3[$combination[0]] * $spinCost;
				}
			}
			if ($spinCost > $myCash){
				echo "\n\n\e[1;31m Not enought money \e[0m\n\n";
				break;
			}
			break;
		case 2:
			$boardRows = 3;
			$boardColumns = 5;
			$board = array_fill(0, $boardRows, array_fill(0, $boardColumns, '-'));
			$combinations = $combinations3x5;

			if ($playerWon > 0){
				$myCash += $playerWon;
				echo "\e[0;34m You won\e[0m \e[1;34m[{$playerWon}€] \e[0m\n";
			} else {
				echo "Empty spin\n";
			}
			foreach ($board as $rowIndex => $item) {
				foreach ($item as $columnIndex => $value) {
					$board[$rowIndex][$columnIndex] = $symbols3[array_rand($symbols3)];
				}
			}
			drawBoard($board);
			$myCash -= $spinCost;
			$combinationBoard = [];
			foreach ($combinations as $index => $combination){
				foreach ($combination as $r => $c){
					$combinationBoard[$index][] = $board[$c][$r];
				}
			}
			$playerWon = 0;
			foreach ($combinationBoard as $combination) {
				if (count(array_unique($combination)) === 1) {
					$playerWon += $toWin3[$combination[0]] * $spinCost;
				}
			}
			if ($spinCost > $myCash){
				echo "\n\n\e[1;31m Not enought money \e[0m\n\n";
				break;
			}
			break;
		case 3:
			echo "\e[0;34m You have\e[0m \e[1;34m [{$myCash}€]\e[0m\n";
			$chanceToChangeSpinCoast = readline("Cost per spin");
			if ($chanceToChangeSpinCoast <= $myCash) {
				$spinCost = $chanceToChangeSpinCoast;
				echo "\e[0;34m Your bet is changed to \e[0m \e[1;34m {$spinCost}\e[0m\n";
			} else {
				echo "\n\n\e[1;31m You dont have money for so high bet \e[0m\n\n";
			}
			break;
		default:
			break;
	}
}