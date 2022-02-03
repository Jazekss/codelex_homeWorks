<?php
class Player {

private array $cards;
private int $sumOfCards;

function getCards(): array {
return $this->cards;
}

function sumOfCards() {
$x = 0;
foreach ($this->cards as $value) {
if($value == "J" || $value == "Q" || $value == "K") {
$value = 10;
$x += $value;
} else if($value == "A") {
$value = 11;
$x += $value;
} else $x += $value;
}
$this->sumOfCards = $x;
}

public function declareCards($card) {
$this->cards[] = $card;
}
public function getSum(): int {
return $this->sumOfCards;
}
}

class BlackJack
{

private array $cards = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];

public function drawCard() {
return $this->cards[rand(0, count($this ->cards) - 1)];
}

}

while(true) {

$player = new Player();
$dealer = new Player();
$board = new BlackJack();

$playerInput = 0;

$dealer->declareCards($board->drawCard());

$player->declareCards($board->drawCard());
$player->declareCards($board->drawCard());


while ($playerInput !== 2) {

$player->sumOfCards();
$dealer->sumOfCards();

echo "Player Cards: " . implode(" ", $player->getCards()) .
str_repeat(" ", 16 - count($player->getCards()) * 2) . "Dealer Cards: " .
implode(" ", $dealer->getCards()) . "\n";
echo " Total " . $player->getSum() . str_repeat(" ", 21) . " Total " . $dealer->getSum() . "\n";
echo "\n";

echo "[1] = Draw\n";
echo "[2] = Stay\n";

if ($player->getSum() > 21) {
echo "Bust\n";
break;
}
if ($player->getSum() == 21 && count($player->getCards()) == 2 && in_array("10", $player->getCards()) == false) {
echo "BLACKJACK!\n";
break;
}

$playerInput = readline("");

if ($playerInput == 1) {
$player->declareCards($board->drawCard());
continue;
}
if ($playerInput == 2) {
break;
}

}

if($player->getSum() < 21) {

while ($dealer->getSum() < 17) {

$dealer->declareCards($board->drawCard());

$player->sumOfCards();
$dealer->sumOfCards();

echo "\n";
echo "Player Cards: " . implode(" ", $player->getCards()) .
str_repeat(" ", 16 - count($player->getCards()) * 2) ."Dealer Cards: " .
implode(" ", $dealer->getCards()) . "\n";
echo " Total " . $player->getSum() . str_repeat(" ", 21) . " Total " . $dealer->getSum() . "\n";
echo "\n";

sleep(1);
}

if ($dealer->getSum() <= 21 && $dealer->getSum() > $player->getSum()) {
echo "Dealer Wins\n";
} else if ($dealer->getSum() == $player->getSum()) {
echo "TIE\n";
} else echo "Player Wins\n";
}

echo "=====================\n";
echo "[Any] Play again\n";
echo "[2] Exit\n";

$menu = readline("");

if($menu == 2) {
return false;
}
}