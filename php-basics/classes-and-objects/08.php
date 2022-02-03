<?php
class SavingAccount
{
	private float $balance;
	private float $allDeposit;
	private float $allWithdrawn;
	private float $interests;
	private float $interestRate;
	public function __construct(float $balance, float $allDeposit = 0, float $allWithdrawn = 0, float $interests = 0){
		$this->balance = $balance;
		$this->allDeposit = $allDeposit;
		$this->allWithdrawn = $allWithdrawn;
		$this->interests = $interests;
	}
	public function getAllDeposited(): float{
		return $this->allDeposit;
	}
	public function getAllWithdrawn(): float{
		return $this->allWithdrawn;
	}
	public function getInterests(): float{
		return $this->interests;
	}
	public function getBalance(): float{
		return $this->balance;
	}
	public function withdrawal(float $amount): void{
		$this->balance -= $amount;
		$this->allWithdrawn += $amount;
	}
	public function deposit(float $amount): void{
		$this->balance += $amount;
		$this->allDeposit += $amount;
	}
	public function addMonthlyInterest(int $interestRate): void{
		$this->balance += round($this->balance*(($interestRate/12)/100), 2);
		$this->interests += round($this->balance*($interestRate/100)/12, 2);
	}
}
echo "";
echo "\e[0;35m╔════\e[0m \e[1;35mᗷᗩᑎK ᔕᗩᐯIᑎG ᑕᗩᒪᑕᑌᒪᗩTOᖇ\e[0m \e[0;35m════\e[0m\n";
echo "\e[0;35m╟–{\e[0m \e[0;32mMoney in bank acocunt:\e[0m" . "\e[0;34m";
$cash = readline("") . "\e[0m";
$account = new SavingAccount($cash);
echo "\e[0;35m╟–{\e[0m \e[0;32mAnnual interest rate:\e[0m " . "\e[0;34m";
$rate = readline("") . "\e[0m";
echo "\e[0;35m╟–{\e[0m \e[0;32mMonths account opened:\e[0m " . "\e[0;34m";
$monthsCount = readline("") . "\e[0m";
for ($i=1; $i<=$monthsCount; $i++)
{
	echo "\e[0;35m╟–{\e[0m \e[0;32m{$i} month deposit:\e[0m " . "\e[0;34m";
	$deposit = readline("") . "\e[0m";
	if ($deposit>0){$account->deposit($deposit);}
	echo "\e[0;35m╟–{\e[0m \e[0;32m{$i} month withdrawn:\e[0m " . "\e[0;34m";
	$withdrawn = readline("") . "\e[0m";
	if ($withdrawn>0){$account->withdrawal($withdrawn);}
	$account->addMonthlyInterest($rate);
}
echo "\e[0;35m╠════════════════════════════════\e[0m\n";
echo "\e[0;35m║\e[0m \e[0;32mTotal deposited:\e[0m \e[1;32m$" . number_format($account->getAllDeposited(), 2,  ".", ",") . "\e[0m\n";
echo "\e[0;35m║\e[0m \e[0;32mTotal withdrawn:\e[0m \e[1;32m$" . number_format($account->getAllWithdrawn(), 2, ".", ",") . "\e[0m\n";
echo "\e[0;35m║\e[0m \e[0;32mInterest earned:\e[0m \e[1;32m$" . number_format($account->getInterests(), 2, ".", ",") . "\e[0m\n";
echo "\e[0;35m║\e[0m \e[0;32mEnding balance:\e[0m \e[1;32m$" . number_format($account->getBalance(), 2, ".", ",") . "\e[0m\n";
echo "\e[0;35m╚════════════════════════════════\e[0m";
