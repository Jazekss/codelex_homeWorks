<?php
class Date
{
	private string $day;
	private string $month;
	private string $year;
	public function __construct(string $day, string $month, string $year){
		$this->day = $day;
		$this->month = $month;
		$this->year = $year;
	}
	public function getDay(){
		return $this->day;
	}
	public function getMonth(){
		return $this->month;
	}
	public function getYear(){
		return $this->year;
	}
}
$date = new Date("d", "m", "Y");
echo date($date->getDay() . '/' . $date->getMonth() . '/' . $date->getYear());