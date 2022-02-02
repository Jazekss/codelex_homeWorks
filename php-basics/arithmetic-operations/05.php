<?php
echo "Exercise #5 : \n";
echo "I'm thinking of a number between 1-100. \n";
$random = rand(1, 100);
$guess = readline('Guess:');
if ($random == $guess){
	echo "You guessed it!  What are the odds?!?";
} else {
	if($random > $guess){
		echo "Sorry, you are too low.  I was thinking of $random.";
	} else {
		echo "Sorry, you are too high.  I was thinking of $random.";
	}
}
