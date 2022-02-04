<?php
$words = ['fish', 'door', 'car', 'floor', 'china', 'spark', 'dark', 'tube', 'boy', 'girl', 'nose', 'bar', 'fool', 'house'];
shuffle($words);
$word = $words[0];
$letters = str_split($word);
$attempts = 5;
$displayedLetters = []; // Noslēptais vārds par _
$guessed = []; // Saglabā gan pareizos, gan nepareizos burtus
$guessedWrong[] = ""; // Saglaba nepareizos burtus
/** Aizstāj katru burtu ar '_' */
foreach ($letters as $letter) {
	$displayedLetters[] = '_';
}
$wrong = false;
while (true) {
	echo "DEV: hidden word: {$word}\n"; /** DEV line */
	/** Slēptais vārds uz String izvadei uz ekrāna kā '_ _ _ _' */
	$displayedWord = implode(' ', $displayedLetters);
	echo "\n\e[0;35m╭––––––––––––––––––┄┈\e[0m\n";
	echo "\e[0;35m│\e[0m \e[0;35mGuess the word!\e[0m\n";
	echo "\e[0;35m│ ✎  \e[0m \e[1;35m{$displayedWord}\e[0m\n";
	/** Pārbauda, ja '_' vairs nav palikšas, tad ir uzvara */
	if (strpos($displayedWord, '_') === false) { // WON
		echo "\e[0;35m├––––––––––––––––––┄┈\e[0m\n";
		echo "\e[0;35m│\e[0m \e[1;32mCONGRATULATIONS!!!\e[0m\n";
		echo "\e[0;35m╰––––––––––––––––––┄┈\e[0m\n";
		break;
	}
	echo "\e[0;35m│\e[0m Attempts left: {$attempts}\n";
	echo "\e[0;35m│\e[0m Letters tried: ";
	foreach ($guessed as $letter) {
		echo $letter . " ";
	}
	$guessed1 = implode($guessed);
	echo "\n\e[0;35m├––––––––––––––––––┄┈\e[0m\n";
	$guess = readline("\e[0;35m│\e[0m Guess a letter: ");
	$guessed[] = $guess;

	foreach ($letters as $index => $letter) {
		if ($letter === $guess) {
			$displayedLetters[$index] = $guess;
			$attempts++;
			$wrong = false;
		}
	}
	foreach ($letters as $index => $letter) {
		if ($letter !== $guess) {
			$wrong = true;
		}
	}
	echo $wrong;
	if($wrong == true){
		$attempts--;
	}
	/** Ja mēģinājumi beidzas, spēle ir zaudēta */
	if($attempts == 0) { // LOSE
		// Neizdevās izdomāt kāpēc izlec kaut kāds '1' šajā vietā pēc zaudes
		echo "\n\e[0;35m├––––––––––––––––––┄┈\e[0m\n";
		echo "\e[0;35m│\e[0m \e[1;31mAttempts ended\e[0m\n";
		echo "\e[0;35m│\e[0m \e[1;31mSorry, You lose!\e[0m\n";
		echo "\e[0;35m╰––––––––––––––––––┄┈\e[0m\n";
		exit;
	}
}
