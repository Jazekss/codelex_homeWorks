<?php
Class Deck
{
	public array $faces = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];
	public array $back = ["♥", "♦", "♤", "♧"];
	public array $deck = [];
	public int $value = 0;
	public function __construct(){
		foreach ($this->back as $back){
			foreach ($this->faces as $face){
				$value = $face;
				if (!is_numeric($face)){
					$value = 10;
				}
				if ($face == 'A'){
					$value = 11;
				}
				$this->deck[] = array("face" => $face, "value" => $value, "back" => $back);
			}
		}
	}
	public function random(){
		$one = $this->deck;
		shuffle($one);
		return $one[0];
	}
}
// Above prepared cards for Player and PC
$newDeck = new Deck();
$player1 = $newDeck->random();
$player2 = $newDeck->random();
$player3 = $newDeck->random();
$player4 = $newDeck->random();
$player5 = $newDeck->random();
$pc1 = $newDeck->random();
$pc2 = $newDeck->random();
$pc3 = $newDeck->random();
$pc4 = $newDeck->random();
$pc5 = $newDeck->random();
echo "Player {$player1['face']} {$player2['face']} {$player3['face']} {$player4['face']} {$player5['face']}\n";
echo "Player {$player1['back']} {$player2['back']} {$player3['back']} {$player4['back']} {$player5['back']}\n";
echo "PC     {$pc1['face']} {$pc2['face']} {$pc3['face']} {$pc4['face']} {$pc5['face']}\n";
echo "PC     {$pc1['back']} {$pc2['back']} {$pc3['back']} {$pc4['back']} {$pc5['back']}\n";
die;

// First two cards
echo "Get cards! [ENTER]"; echo readline('');
$player = $player1['value'] + $player2['value'];
$pc = $pc1['value'] + $pc2['value'];
echo "Player get: [{$player1['face']} {$player1['back']}] and [{$player2['face']} {$player2['back']}] // You have: {$player} \n";
echo "PC get: [{$pc1['face']} {$pc1['back']}] and [{$pc2['face']} {$pc2['back']}] // PC have: {$pc}\n";

if($player == 21) { // For Player
	echo "You WON [{$player}], PC have [{$pc}]"; exit;
}elseif($player > 21){
	echo "You lose [{$player}]"; exit;
}
if($pc == 21) { // For PC
	echo "PC WON! [{$pc}], You have [{$player}]";	exit;
}elseif($pc > 21){
	echo "PC lose [{$pc}]";	exit;
}
if($player >= 17 && $player <= 20){ // If Player have between 17-20
	if($player > $pc){ // If Player have more than PC
		echo "You WON [{$player}], PC have [{$pc}]";
		exit;
	}elseif($player < $pc){ // If Player have less than PC
		echo "You lose [{$player}], PC WON [{$pc}]";
		exit;
	}
}else { // Third card
	echo "Get One more card? [ENTER]";
	echo readline('');
	$player += $player3['value'];
	$pc += $pc3['value'];
	echo "Player get: [{$player1['face']} {$player1['back']}{$player3['face']} {$player3['back']} {$player3['face']} {$player3['back']}]  // You have: {$player} \n";
	echo "PC get: [{$pc1['face']} {$pc1['back']} {$pc2['face']} {$pc2['back']} {$pc3['face']} {$pc3['back']}] // PC have: {$pc}\n";

	if ($player == 21) { // For Player
		echo "You WON [{$player}], PC have [{$pc}]";
		exit;
	} elseif ($player > 21) {
		echo "You lose [{$player}]";
		exit;
	}
	if ($pc == 21) { // For PC
		echo "PC WON! [{$pc}], You have [{$player}]";
		exit;
	} elseif ($pc > 21) {
		echo "PC lose [{$pc}]";
		exit;
	}
	if ($player >= 17 && $player <= 20) { // If Player have between 17-20
		if ($player > $pc) { // If Player have more than PC
			echo "You WON [{$player}], PC have [{$pc}]";
			exit;
		} elseif ($player < $pc) { // If Player have less than PC
			echo "You lose [{$player}], PC WON [{$pc}]";
			exit;
		}
	}
}
echo "nothing happen";


//var_dump($newDeck->random());
//var_dump($newDeck->randCard(['face']));

//echo "=== === Deck: === ===\n";
//print_r($newDeck->deck); // All cards values
// [0] => Array( [face] => A, [value] => 11)
// [1] => Array( [face] => 2, [value] => 2)
// [2] => Array( [face] => 3, [value] => 3)
// [3] => Array( [face] => 4, [value] => 4)
// [4] => Array( [face] => 5, [value] => 5)
// [5] => Array( [face] => 6, [value] => 6)
// [6] => Array( [face] => 7, [value] => 7)
// [7] => Array( [face] => 8, [value] => 8)
// [8] => Array( [face] => 9, [value] => 9)
// [9] => Array( [face] => 10, [value] => 10)
//[10] => Array( [face] => J, [value] => 10)
//[11] => Array( [face] => Q, [value] => 10)
//[12] => Array( [face] => K, [value] => 10)