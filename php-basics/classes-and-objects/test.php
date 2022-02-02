<?php
$balance = 10000;
$in1 = 100;			$in01 = 100 * ($in1 * (5/12/4));
$in2 = 230;			$in02 = 230 * ($in2 * (5/12/4));
$in3 = 4050;		$in03 = 4050 * ($in3 * (5/12/4));
$in4 = 3450;		$in04 = 3450 * ($in4 * (5/12/4));
$out1 = 1000;		$out01 = 1000 * ($out1 * (5/12/4));
$out2 = 103;		$out02 = 103 * ($out2 * (5/12/4));
$out3 = 2334;		$out03 = 2334 * ($out3 * (5/12/4));
$out4 = 2340;		$out04 = 2340 * ($out4 * (5/12/4));

$deposit = $in01 + $in02 + $in03 + $in04;
$withdrawn = $out01 - $out02 - $out03 - $out04;
$balanceWith = $balance * (5/12/4);

$inAll = $in1 + $in2 + $in3 + $in4;
$outAll = $out1 - $out2 - $out3 - $out4;

$balanceInAll = $balance + $inAll;
$balanceOutAll = $balance - $outAll;
$balanceWithout = $balance - $outAll + $inAll;
echo "Balance + in: {$balanceInAll}€ | Balance - out: {$balanceOutAll}€ | Balance without: {$balanceWithout}€\n";
echo "======================================================================\n";
echo "Ielikts:       " . $deposit . PHP_EOL;
echo "Izņemts:       " . $withdrawn . PHP_EOL;
//echo "Procenti:      " .
echo "Beigu bilance: " . ($balanceWith - $withdrawn + $deposit);

$interest = 5 / 12;
$re1 = ($balance + $in1 - $out1);
$res1 = $re1 * $interest;

$re2 = ($res1 + $in2 - $out2);
$res2 = $re2 * $interest;

$re3 = ($res2 + $in3 - $out3);
$res3 = $re3 * $interest;

$re4 = ($res3 + $in4 - $out4);
$res4 = $re4 * $interest;

echo "Par mēnesi:   " . $res4 . PHP_EOL;
echo "Par gadu:     " . $res5 = $res4 * 12 . PHP_EOL;
echo "Par 4 gadiem: " . $res5 * 4 . PHP_EOL;

echo "1 periods: " . $res1 . PHP_EOL;
echo "2 periods: " . $res2 . PHP_EOL;
echo "3 periods: " . $res3 . PHP_EOL;
echo "4 periods: " . $res4 . PHP_EOL;

class BankAccount
{
	private int $balance;
	private int $interest;
	public function getBalance(){
		return $this->balance;
	}
	public function deposit($amount){
	$this->balance = $this->balance + $amount;
	}
	public function withdraw($amount){
		$this->balance = $this->balance - $amount;
	}
	public function interests(): string{
		return $this->interest;
	}
	public function getEndBalance(): string{
		return $this->balance;
	}
}
$bank = new BankAccount();

// Results
echo "Total deposited: $" . $bank->deposit();
echo "Total withdrawn: $" . $bank->withdraw();
echo "Interest earned: $" . $bank->interests();
echo "Ending balance: $" . $bank->getEndBalance();
/** Total deposited: $7,830.00
		Total withdrawn: $5,777.00
		Interest earned: $29,977.72
		Ending balance: $42,030.72 */