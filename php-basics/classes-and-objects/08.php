<?php
class SavingAccount
{
	private string $balance;
	public function balance(): string{
		return $this->balance;
	}
	public function withdraw(){
		return $this->balance;
	}
	public function deposit(float $amount){
		$this->balance += $amount;
	}
//	public function monthly($amount){
//		return $this->amount -= $amount;
//	}
}
$deposit = new SavingAccount();
$deposit->balance(10000);
echo $deposit;


// Gada procentu likmi dala ar 12, ikmēneša procentu likmi reizina ar
//		atlikumu un pievieno rezultātu atlikumam

//