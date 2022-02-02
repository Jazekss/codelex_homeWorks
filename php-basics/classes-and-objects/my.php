<?php
class Card
{
	private string $suit;
	private string $symbol;

	public function __construct(string $suit, string $symbol)
	{
		$this->suit = $suit;
		$this->symbol = $symbol;
	}

	public function getValue(): int
	{
		if ($this->symbol == "J" || $this->symbol == "Q" || $this->symbol == "K") {
			return 10;
		}
		return (int) $this->symbol;
	}

	public function getDisplayValue(): string
	{
		return "{$this->symbol}.{$this->suit}";
	}
}
class Deck
{
	private array $cards = [];
	private array $symbols = [
		'♣', '♦', '♥', '♠'
	];

	public function __construct(array $cards = [])
	{
		$this->cards = $cards;
		if (empty($this->cards)) $this->shuffle();
	}

	public function draw(): Card
	{
		$randomCardIndex = array_rand($this->cards);
		$card = $this->cards[$randomCardIndex];
		array_splice($this->cards, $randomCardIndex, 1);
		return $card;
	}

	private function shuffle(): void
	{
		$this->cards = [];
		for ($i = 1; $i <= 13; $i++) {
			for ($j = 0; $j < 4; $j++) {
				switch ($i) {
					case 11:
						$this->cards[] = new Card($this->symbols[$j], 'J');
						break;
					case 12:
						$this->cards[] = new Card($this->symbols[$j], 'Q');
						break;
					case 13:
						$this->cards[] = new Card($this->symbols[$j], 'K');
						break;
					default:
						$this->cards[] = new Card($this->symbols[$j], $i);
						break;
				}
			}
		}
	}
}
$player = new Deck;
$player1 = new Card;
//echo $player1->getDisplayValue();
//echo $player1->getValue();
echo $player->draw();