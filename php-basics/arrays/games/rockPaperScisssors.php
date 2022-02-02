<?php
$combinations = function($player, $computer) {
	$rock = 1; $paper = 2; $scissors = 3;	$lizard = 4; $spock = 5;
	$matches = array(
	$rock => array($scissors, $lizard),
	$paper => array($rock, $spock),
	$scissors => array($paper, $lizard),
	$lizard => array($spock, $paper),
	$spock => array($scissors, $rock),
	);
	return in_array($computer, $matches[$player]);
};
$is = [
	1 => 'Rock',
	2 => 'Paper',
	3 => 'Scissors',
	4 => 'Lizard',
	5 => 'Spock'
];
echo "Rock, Paper Scissors, Lizard, Spock\n";
echo "1: Rock, 2: Paper, 3: Scissors, 4: Lizard, 5: Spock\n";
$player = readline("Enter 1-5: ");
$computer = rand(1, 5);

if ($player == $computer) {
	echo "Player's '{$is[$player]}' is same as Computer's '{$is[$computer]}'\n";
	echo "Draw!\n";
} elseif ($combinations($player, $computer)) {
	echo "Player's '{$is[$player]}' beats Computer's '{$is[$computer]}'\n";
	echo "Player wins\n";
} else {
	echo "Computers's '{$is[$computer]}' beats Player's '{$is[$player]}'\n";
	echo "Computer wins\n";
}






/* Spēlētāju skaits: 1
 * Spēle notiek pret datoru
 * Spēles notikumu "logs",
 * kurā tiek saglabāts spēlētāja izvēle + pret ko cīnījās un kāds bija rezultāts.
 */

/*

