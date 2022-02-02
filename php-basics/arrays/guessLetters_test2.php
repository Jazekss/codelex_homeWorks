<?php
echo "\n\n\n = = = = = THIS IS START OF THIS FILE = = = = = \n\n";
$words = ['lemon'];
$word = $words[array_rand($words)]; // Randomi izvēlas vienu vadru o masīva
$wordLength = strlen($word);	// Slēptā vārda garums (ciparos)
$wordSplit = str_split($word); // Sagriež vārdu pa burtiem
$attempts = 5; // Minēšanas mēģinājumu skaits
$enteredLetters = [];
// 	= 	= 	= 	=	 	= 	= 	= 	=
echo "Hide word: {$wordHide}";
echo "Cikls FOR sadala vārdu:\n";
for ($i = 0; $i <= strlen($word)-1; $i++){
	$wordSplit = str_split($word);
	echo "[{$i}] - {$wordSplit[$i]} ||  ";
}
echo "\nCikls FOR sadala slēpto vārdu aizstājot simbilus:\n";
for ($i = 0; $i <= strlen($word)-1; $i++){
	$wordHide = str_split($word);
	$wordHide = str_repeat('_', strlen($word));
	$wordHide = str_split($wordHide);
}
echo implode($wordHide);
echo "\n Check and replace \n";
while (true) {
	$lettersTryed = readline("Enter letter: ");
	for ($w = 0; $w <= $wordLength-1; $w++) {
		if ($lettersTryed === $word[$w]) {
			$enteredLetters[$w] = $lettersTryed;
			$wordHide[$w] = $enteredLetters[$w];

			echo " [{$w}] Letter is: {$word[$w]} and entered letter is: {$lettersTryed}";
			echo "\n";
			echo implode($wordHide);
			echo "\n";
			$hidden[$w] = $lettersTryed;
			$wrongGuess = false;
		}
		if($lettersTryed !== $word[$w]) {
			$attempts = $attempts - 1;
			$enteredLetters[] = $lettersTryed;
		}
		$i = $i + 1;
	}
	echo $attempts;
	echo "\n Entered letters: " . implode($enteredLetters) . PHP_EOL;
	echo "\n";

}
