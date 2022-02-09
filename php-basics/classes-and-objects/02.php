<?php
class Point
{
	private int $p1;
	private int $p2;
	public function __construct(int $p1, int $p2)	{
		$this->p1 = $p1;
		$this->p2 = $p2;
	}
	public function swapPoints(Point &$a, Point &$b): void {
		$temp = $a;
		$a = $b;
		$b = $temp;
	}
	public function returnA(): int {
		return $this->p1;
	}
	public function returnB(): int {
		return $this->p2;
	}
}
$first = new Point(5, 2);
$second = new Point(-3, 6);
$first->swapPoints($first, $second);
echo "({$first->returnA()}, {$first->returnB()})\n";
echo "({$second->returnA()}, {$second->returnB()})";
