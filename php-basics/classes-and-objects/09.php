<?php
class BankAccount
{
	private string $name;
	private string $balance;
	public function __construct(string $name, float $balance){
		$this->name = $name;
		$this->balance = strtok(round($balance, 2), '.') . '.' . str_pad(strtok('.'), 2, '0');
	}
	function show_user_name_and_balance() {
		if($this->balance < 0){
			$this->balance = abs($this->balance);
			$this->balance = strtok(round($this->balance, 2), '.') . '.' . str_pad(strtok('.'), 2, '0');
			$this->balance = "-$" . $this->balance;
		}
		return "{$this->name}, {$this->balance}";
	}
}
$bob = new BankAccount('Benson', 17.50); // Positive balance
$bob2 = new BankAccount('Benson', -17.50); // Negative balance
echo $bob->show_user_name_and_balance() . PHP_EOL;
echo $bob2->show_user_name_and_balance();