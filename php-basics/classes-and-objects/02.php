<?php
class Point
{
	public array $p1;
	public array $p2;
	public function __construct($p1, $p2){
		$this->p1 = $p1;
		$this->p2 = $p2;
	}
	public function swapPoints($p1, $p2){
		$p3 = '';
		$p3 = $p1;
		$p1 = $p2;
		$p2 = $p3;
		return $p1 . ", " . $p2;
	}
}
$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$swap->swapPoints($p1, $p2);
echo "P1 = ({$p1[0]}, {$p1[1]}) and P2 = ({$p2[0]}, {$p2[1]})\n";



//$p11 = $swap->swapPoints($p1, $p2);
//print_r($p11[0]);
