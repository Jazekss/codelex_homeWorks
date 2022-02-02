<?php
$words = ['is']; //['fish', 'door', 'car', 'floor', 'china', 'spark', 'dark', 'tube', 'boy', 'girl', 'nose', 'bar', 'fool', 'house'];
shuffle($words); // Aizkomentēts kamer tiek taisīts,
$word = $words[0];		 //  bet diemžēl kaut kas nestrādā
$letters = str_split($word);
$attempts = 5;
$displayedLetters = [];
$lettersTried = '';
foreach ($letters as $letter) {
	$displayedLetters[] = '_';
}
$guessed = [];
$displayedWord = implode(' ', $displayedLetters);
echo "DEV: hidden word: {$word}\n";
echo "Guess the word!\n";
echo " ✎ {$displayedWord} \n";

while (true) {
	if (strpos($displayedWord, '_') === false) { // WON
		echo " CONGRATULATIONS!!!\n";
		break;
	}
	echo " Attempts left: {$attempts}\n";
	echo " Letters tried: ";
	for($i = 0; $i <= count($guessed); $i++){
		echo $guessed[$i] . " ";
	}
	echo "\n";
	$guessed1 = implode($guessed);
	$guess = readline(" Guess a letter: ");
	if ($attempts > 1) {
		if ($guess === $letters[$i]) {
			$guessed[] = $guess;
			//$attempts += 1; // šī līnija, jo nevarēju saprast kādēļ pareizi atbildot ir -1
		}else{
			$guessed[] = $guess;
			$attempts -= 1;
		}
	} else { // LOSE
		echo " Attempts ended\n";
		echo " Sorry, You lose!\n";
		exit;
	}

	$displayedWord = implode(' ', $displayedLetters);
	echo "DEV: hidden word: {$word}\n";
	echo "Guess the word!\n";
	echo " ✎  {$displayedWord}\n";
}
