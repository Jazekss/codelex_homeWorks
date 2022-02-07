<?php
class Account
{
	private float $balance;
	private string $name;
	public function __construct(string $name, float $balance) {
		$this->name = $name;
		$this->balance = $balance;
	}
	public function getName(): string {
		return $this->name;
	}
	public function getBalance(): string {
		return $this->balance . "€";
	}
	public function deposit($amount): float {
		return $this->balance += $amount;
	}
	public function withdraw($amount): float {
		return $this->balance -= $amount;
	}
	public static function transfer(Account $from, Account $to, int $howMuch): void {
		$money = $howMuch;
		$from->withdraw($money);
		$to->deposit($money);
	}
}
$bankOne = new Account("Matt's account", 1000.00);
$bankTwo = new Account("My account", 0.00);
$bankThree = new Account("Thirs account", 0.00);
echo "_____Bank account before____\n";
echo "{$bankOne->getName()} balance is {$bankOne->getBalance()}\n";
echo "{$bankTwo->getName()} balance is {$bankTwo->getBalance()}\n";
echo "{$bankThree->getName()} balance is {$bankThree->getBalance()}\n";
echo "_____Bank account after first transaction____\n";
Account::transfer($bankOne, $bankTwo, 50.00);
echo "{$bankOne->getName()} balance is {$bankOne->getBalance()}\n";
echo "{$bankTwo->getName()} balance is {$bankTwo->getBalance()}\n";
echo "{$bankThree->getName()} balance is {$bankThree->getBalance()}\n";
echo "_____Bank account second transaction____\n";
Account::transfer($bankTwo, $bankThree, 25.00);
echo "{$bankOne->getName()} balance is {$bankOne->getBalance()}\n";
echo "{$bankTwo->getName()} balance is {$bankTwo->getBalance()}\n";
echo "{$bankThree->getName()} balance is {$bankThree->getBalance()}\n";