<?php
//error_reporting(E_ALL);
Class Deck
{
	private array $faces = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];
	private array $backs = ["♥", "♦", "♤", "♧"];
	private array $deck = [];
	private array $used = [];
	private int $value = 0;
	public function Construct() {
		foreach ($this->faces as $index=> $make) {
			foreach ($this->backs as $ind=> $construct) {
				if($index == 9 && $ind == 1 || $index == 9 && $ind == 2 || $index == 9 && $ind == 3) {
					continue;
				} else
					$this->deck[] =  ["faces" => $this->faces, "backs" => $this->backs];
			}
		}
	}
	public function random(){
		shuffle($this->deck);
		foreach ($this->deck as $card){
			$this->used[] = $card;
			while($this->used != $card){
				return $card;
			}
		}
		return $card;
	}

}
$random = new Deck;
$aa = $random->random();
var_dump($aa);


die;
//echo "{$random['face']} and {$random['back']}";
//var_dump($random['face']);
$player1 = $random->random();
$player2 = $random->random();
$player3 = $random->random();
$player4 = $random->random();
$player5 = $random->random();
echo "Player {$player1['face']} {$player2['face']} {$player3['face']} {$player4['face']} {$player5['face']}\n";
echo "Player {$player1['back']} {$player2['back']} {$player3['back']} {$player4['back']} {$player5['back']}\n";

die;
for($i = 0; $i <= 2; $i++) {
	$p = $random->random();
	echo "Player {$p['face']} {$p['value']} {$p['back']}\n";
}
