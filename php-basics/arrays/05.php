<?php

// TicTacToe

$board = [
	['-', '-', '-'],
	['-', '-', '-'],
	['-', '-', '-'],
];


$player1 = readline('Enter player [1] symbol: ');
$player2 = readline('Enter player [2] symbol: ');
if($player1 === ''){ $player1 = "☻"; }
if($player2 === ''){ $player2 = "☺"; }

$activePlayer = $player1;

$combinations = [
	[
		[0, 0], [0, 1], [0, 2],
	],
	[
		[1, 0], [1, 1], [1, 2]
	],
	[
		[2, 0], [2, 1], [2, 2]
	],
	[
		[0, 0], [1, 1], [2, 2]
	]
];

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
	foreach ($combinations as $combination) {
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

	return false;
}

function isBoardFull(array $board): bool
{
	foreach ($board as $row) {
		if (in_array('-', $row)) return false;
	}
	return true;
}

while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
	echo "\n\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
	echo "\e[0;35m│\e[0m [{$board[0][0]}][{$board[0][1]}][{$board[0][2]}]\n";
	echo "\e[0;35m│\e[0m [{$board[1][0]}][{$board[1][1]}][{$board[1][2]}]\n";
	echo "\e[0;35m│\e[0m [{$board[2][0]}][{$board[2][1]}][{$board[2][2]}]\n";
	echo "\e[0;35m╰––––––––––––––––┄┈\e[0m\n";
	echo "\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
	$position = readline("\e[0;35m│\e[0m Enter position {$activePlayer}: ");
	[$row, $column] = explode(',', $position);

	if ($board[$row][$column] !== '-') {
		echo "\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
		echo "\e[0;35m│\e[0m Invalid position. its taken!\n";
		echo "\e[0;35m╰––––––––––––––––┄┈\e[0m\n";
		continue;
	}

	$board[$row][$column] = $activePlayer;

	if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
	{
		echo "\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
		echo "\e[0;35m│\e[0m Winner is " . $activePlayer . PHP_EOL;
		echo "\e[0;35m╰––––––––––––––––┄┈\e[0m\n";
		echo "\n";
		exit;
	}

	$activePlayer = $player1 === $activePlayer ? $player2 : $player1;

}
echo "\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
echo "\e[0;35m│\e[0m The game was tied.";
echo "\e[0;35m╰––––––––––––––––┄┈\e[0m\n";
echo PHP_EOL;