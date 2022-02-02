<?php

// Choose of symbols
$symbols1 = [' J ', ' Q ', ' K ', ' A ', ' ✦ ', ' ≛ '];
$symbols2 = [' ♠ ', ' ♣ ', ' ♥ ', ' ♦ ', ' € ', ' ⁉ '];
$symbols3 = ['【J】', '【Q】', '【K】', '【A】', '【#】', '【*】'];
// Field 3x3 with combinations \e[0;35m│\e[0m
$board3x3 = [
	['  ', '  ', '  '],
	['  ', '  ', '  '],
	['  ', '  ', '  '],
];
$combinations3x3 = [
	[[0, 0], [0, 1], [0, 2]],      //Upper line
	[[0, 1], [1, 1], [1, 2]],     //Middle line
	[[0, 2], [2, 1], [2, 2]],   //Lower line
	[[0, 0], [1, 1], [2, 2]],  //Up-down cross line
	[[2, 0], [1, 1], [0, 2]] //Down-up cross line
];
// Field 3x5 with combinations
$board3x5 = [
	['  ', '  ', '  ', '  ', '  '],
	['  ', '  ', '  ', '  ', '  '],
	['  ', '  ', '  ', '  ', '  '],
];
$combinations3x5 = [
	[[0, 0], [0, 1], [0, 2], [0, 3], [0, 4]],           //Upper line
	[[1, 0], [1, 1], [1, 2], [1, 3], [1, 4]],          //Middle line
	[[2, 0], [2, 1], [2, 2], [2, 3], [2, 4]],         //Lower line
	[[0, 0], [1, 1], [2, 2], [1, 3], [0, 4]],        //Up-down-up line
	[[2, 0], [1, 1], [0, 2], [1, 3], [2, 4]],       //Down-up-down line
	[[0, 0], [0, 2], [1, 2], [2, 3], [2, 4]],      //Up-middle-down line
	[[2, 0], [2, 1], [1, 2], [0, 3], [0, 4]],     //Down-middle-up line
	[[1, 0], [0, 1], [0, 2], [0, 3], [1, 4]],    //1down-3up-1down line
	[[1, 0], [2, 1], [2, 2], [2, 3], [1, 4]],   //1up-3down-1up line
	[[1, 0], [0, 1], [1, 2], [2, 3], [1, 4]],  //Zigzag up-down line
	[[1, 0], [2, 1], [1, 2], [0, 3], [1, 4]] //Zigzag down-up line
];
foreach ($combinations3x5 as $combination) {
	foreach ($combination as $item)
	{
		[$row, $column] = $item;
		if ($board[$row][$column] !== $activePlayer) {
			break;
		}

		if (end($combination) === $item) {
			return true;
		}
	}
}

$player = 20;
$spin = readline("> ENTER <");
while ($player > 0) {
	echo " [1] Field 3x3\n";
	echo " [2] Field 3x5\n";
	$option = readline("Choose kind: ");
	switch ($option) {
		case 1:
			while ($spin !== "q") {
				$player -= 1;
				$board = $board3x3;
				foreach ($board as $item) { // Cikls laukuma izvadei
					foreach ($item as $value) {
						$rand_keys = array_rand($symbols3, 2);
						$field = $symbols3[$rand_keys[0]];
						echo "[$field]";
						$combinOut[] = $field; // Izvades ievietošana masīvā salīdzināšanai
					}
					echo "\n";
				}
				if ($player < 1) {
					echo "Not enought money ";
					exit;
				} elseif ($combinOut[0] == $combinOut[1] && $combinOut[0] == $combinOut[2] && $combinOut[0] == $field) {
					echo "\nMatch {$combinOut[0]} on first line || Money: " . $player = $player + 5 . "!";
					echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					echo $player += 5;
				} elseif ($combinOut[3] == $combinOut[4] && $combinOut[3] == $combinOut[5] && $combinOut[3] == $field) {
					echo "\nMatch {$combinOut[3]} on second line || Money: " . $player = $player + 5 . "!";
					echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					echo $player += 1;
				} elseif ($combinOut[6] == $combinOut[7] && $combinOut[6] == $combinOut[8] && $combinOut[6] == $field) {
					echo "\nMatch {$combinOut[6]} on third line || Money: " . $player = $player + 5 . "!";
					echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					echo $player += 1;
				} elseif ($combinOut[0] == $combinOut[4] && $combinOut[0] == $combinOut[8] && $combinOut[0] == $field) {
					echo "\nMatch {$combinOut[3]} on fourth line || Money: " . $player = $player + 5 . "!";
					echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					echo $player += 1;
				} elseif ($combinOut[6] == $combinOut[4] && $combinOut[6] == $combinOut[2] && $combinOut[6] == $field) {
					echo "\nMatch {$combinOut[6]} on fifth line || Money: " . $player = $player + 5 . "!";
					echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					echo $player += 1;
				} else {
					echo "Ctr+C to quit, ENTER to respin, Money: $player\n";
					$spin = readline("");
				}
			}
			break;
		case 2:
			while ($spin !== "q") {
				$player -= 1;
				$board = $board3x5;
				foreach ($board as $item) { // Cikls laukuma izvadei
					foreach ($item as $value) {
						$rand_keys = array_rand($symbols3, 2);
						$field = $symbols3[$rand_keys[0]];
						echo "[$field]";
						$combinOut[] = $field; // Izvades ievietošana masīvā salīdzināšanai
					}
					echo "\n";
				}
				if ($player < 1) {
					echo "Not enought money";
					exit;
				} elseif ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[2]) { // FOR ONLY -1- LINE
					if ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[2] && $combinOut[2] !== $combinOut[3] && $combinOut[0] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[0]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[2] && $combinOut[2] == $combinOut[3] && $combinOut[3] !== $combinOut[4] && $combinOut[0] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[0]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[2] && $combinOut[2] == $combinOut[3] && $combinOut[3] == $combinOut[4] && $combinOut[0] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[0]} - 10 symbol line || Money: " . $player . "/ Add for line  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[5] == $combinOut[6] && $combinOut[6] == $combinOut[7]) { // FOR ONLY -2- LINE
					if ($combinOut[5] == $combinOut[6] && $combinOut[6] == $combinOut[7] && $combinOut[7] !== $combinOut[8] && $combinOut[7] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[5]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[5] == $combinOut[6] && $combinOut[6] == $combinOut[7] && $combinOut[7] == $combinOut[8] && $combinOut[8] !== $combinOut[9] && $combinOut[8] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[5]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[5] == $combinOut[6] && $combinOut[6] == $combinOut[7] && $combinOut[7] == $combinOut[8] && $combinOut[8] == $combinOut[9] && $combinOut[9] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[5]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[12]) { // FOR ONLY -3- LINE
					if ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[12] && $combinOut[12] !== $combinOut[13] && $combinOut[10] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[10]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[12] && $combinOut[12] == $combinOut[13] && $combinOut[13] !== $combinOut[14] && $combinOut[13] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[10]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[12] && $combinOut[12] == $combinOut[13] && $combinOut[13] == $combinOut[14] && $combinOut[14] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[10]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[0] == $combinOut[6] && $combinOut[6] == $combinOut[12]) { // FOR ONLY -4- LINE
					if ($combinOut[0] == $combinOut[6] && $combinOut[6] == $combinOut[12] && $combinOut[12] !== $combinOut[8] && $combinOut[12] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[5]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[0] == $combinOut[6] && $combinOut[6] == $combinOut[12] && $combinOut[12] == $combinOut[8] && $combinOut[8] !== $combinOut[14] && $combinOut[8] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[5]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[0] == $combinOut[6] && $combinOut[6] == $combinOut[12] && $combinOut[12] == $combinOut[8] && $combinOut[8] == $combinOut[14] && $combinOut[14] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[5]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[10] == $combinOut[6] && $combinOut[6] == $combinOut[2]) { // FOR ONLY -5- LINE
					if ($combinOut[10] == $combinOut[6] && $combinOut[6] == $combinOut[2] && $combinOut[2] !== $combinOut[8] && $combinOut[2] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[10]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[10] == $combinOut[6] && $combinOut[6] == $combinOut[2] && $combinOut[2] == $combinOut[8] && $combinOut[8] !== $combinOut[14] && $combinOut[8] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[10]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[10] == $combinOut[6] && $combinOut[6] == $combinOut[2] && $combinOut[2] == $combinOut[8] && $combinOut[8] == $combinOut[14] && $combinOut[14] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[10]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[7]) { // FOR ONLY -6- LINE
					if ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[7] && $combinOut[7] !== $combinOut[13] && $combinOut[13] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[0]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[7] && $combinOut[13] == $combinOut[13] && $combinOut[13] !== $combinOut[14] && $combinOut[13] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[0]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[0] == $combinOut[1] && $combinOut[1] == $combinOut[7] && $combinOut[13] == $combinOut[13] && $combinOut[13] == $combinOut[14] && $combinOut[14] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[0]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[7]) { // FOR ONLY -7- LINE
					if ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[7] && $combinOut[7] !== $combinOut[3] && $combinOut[7] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[5]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[7] && $combinOut[7] == $combinOut[3] && $combinOut[3] !== $combinOut[4] && $combinOut[3] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[5]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[10] == $combinOut[11] && $combinOut[11] == $combinOut[7] && $combinOut[7] == $combinOut[3] && $combinOut[3] == $combinOut[4] && $combinOut[4] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[5]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[5] == $combinOut[1] && $combinOut[1] == $combinOut[2]) { // FOR ONLY -8- LINE
					if ($combinOut[5] == $combinOut[1] && $combinOut[1] == $combinOut[2] && $combinOut[2] !== $combinOut[3] && $combinOut[2] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[5]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[5] == $combinOut[1] && $combinOut[1] == $combinOut[2] && $combinOut[2] == $combinOut[3] && $combinOut[3] !== $combinOut[9] && $combinOut[3] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[5]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[5] == $combinOut[1] && $combinOut[1] == $combinOut[2] && $combinOut[2] == $combinOut[3] && $combinOut[3] == $combinOut[9] && $combinOut[9] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[5]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} elseif ($combinOut[5] == $combinOut[11] && $combinOut[11] == $combinOut[12]) { // FOR ONLY -9- LINE
					if ($combinOut[5] == $combinOut[11] && $combinOut[11] == $combinOut[12] && $combinOut[12] !== $combinOut[13] && $combinOut[12] == $field) {
						$player += 3;
						echo "\nMatch {$combinOut[5]} - 3 symbol line || Money: " . $player . "  +3!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[5] == $combinOut[11] && $combinOut[11] == $combinOut[12] && $combinOut[12] == $combinOut[13] && $combinOut[13] !== $combinOut[9] && $combinOut[13] == $field) {
						$player += 5;
						echo "\nMatch {$combinOut[5]} - 5 symbol line || Money: " . $player . "  +5!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					} elseif ($combinOut[5] == $combinOut[11] && $combinOut[11] == $combinOut[12] && $combinOut[12] == $combinOut[13] && $combinOut[13] == $combinOut[9] && $combinOut[9] == $field) {
						$player += 10;
						echo "\nMatch {$combinOut[5]} - 10 symbol line || Money: " . $player . "  +10!";
						echo "To SPIN press ENTER || To Exit press 'n' and ENTER";
					}
				} else {
					echo "Ctr+C to quit, ENTER to respin, Money: $player\n";
					$spin = readline("");
				}
			}
			break;
		default:
			exit;
	}
}
