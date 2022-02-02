<?php
class Point
{
	public int $first;
	public int $second;
	public function __construct(int $first, int $second){
		$this->first = $first;
		$this->second = $second;
	}
	public function swapPoints(Point $first, Point $second): void{
		$temp1 = $first->first;
		$temp2 = $first->second;
		$first->first = $second->first;
		$first->second = $second->second;
		$second->first = $temp1;
		$second->second = $temp2;
	}
}
$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);
echo "({$p1->first}, {$p1->second})\n";
echo "({$p2->first}, {$p2->second})";
