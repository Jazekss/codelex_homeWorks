<?php
echo "Exercise #6: \n";
$words = ['is'];//['orange',	'lemon', 'banana', 'grapes', 'peach', 'pineapple', 'papaya', 'mango'];
$word = $words[array_rand($words)];
$wordLength = strlen($word);
$wordSplit = str_split($word);
$attempts = 5;
$enteredLetters = [];
$hidden = [];
$lettersTryed = [];

$wordHideFirst = str_repeat('_', strlen($word));
// Split word in to letters
for ($s = 0; $s <= strlen($word)-1; $s++){
	$wordSplit = str_split($word);
}
// Replace each letter with underscore
for ($i = 0; $i <= strlen($word)-1; $i++) {
	$wordHide = str_split($word);
	$wordHide = str_repeat('_', strlen($word));
	$wordHide = str_split($wordHide);
}
// Iterate trought word and check if letters match
for ($w = 0; $w <= $wordLength-1; $w++) {
	if ($lettersTryed == $word[$w]) {
		$enteredLetters[$w] = $lettersTryed;
		$wordHide[$w] = $enteredLetters[$w];
		$hidden[$w] = $lettersTryed;
		$wrongGuess = false;
	}
}

echo "DEV: hidden word: {$word} (" . $wordLength . " letters)\n";
//Start of word guessing frame
echo "\n\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
echo "\e[0;35m│\e[0m \e[1;35mGuess the word!\e[0m\n";
echo "\e[0;35m│\e[0m ✎ {$wordHideFirst}";
echo "\n\e[0;35m│\e[0m \e[1;35mYou have {$attempts} attempts\e[0m\n";
echo "\e[0;35m╰––––––––––––––––┄┈\e[0m\n";
//End of word guessing frame
echo "\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
echo $lettersTryed = readline("\e[0;35m│\e[0m \e[1;32mLet's try: ") . "\e[0m";

while (true) {
	echo "DEV: hidden word: {$word}\n";
	//Start of word guessing frame
	echo "\n\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
	echo "\e[0;35m│\e[0m \e[1;35mGuess the word!\e[0m\n";
	echo "\e[0;35m│\e[0m ✎  ";
	for ($l = 0; $l <= $wordLength - 1; $l++) {
		echo $hidden[$l] . " ";
	}
	if ($lettersTryed !== $word[$w]) {
		$attempts -=  1;
		$enteredLetters[] = $lettersTryed;
	}

	echo "\n\e[0;35m│\e[0m \e[1;35mYou have {$attempts} attempts\e[0m\n";
	echo "\e[0;35m╰––––––––––––––––┄┈\e[0m\n";
	//End of word guessing frame
	echo "\e[0;35m╭––––––––––––––––┄┈\e[0m\n";
	echo "\n";
	echo $lettersTryed = readline("\e[0;35m│\e[0m \e[1;32mLet's try: ") . "\e[0m";
	for ($w = 0; $w <= $wordLength-1; $w++) {
		if ($lettersTryed === $word[$w]) {
			$enteredLetters[$w] = $lettersTryed;
			$wordHide[$w] = $enteredLetters[$w];
			$hidden[$w] = $lettersTryed;
			$wrongGuess = false;
		}
		if($attempts < 0){
			echo "\n \e[0;31mSorry, You lose!\e[0m \n";
		}
	}
	echo "\n";
}