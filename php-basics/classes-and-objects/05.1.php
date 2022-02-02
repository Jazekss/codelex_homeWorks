<?php
class Date
{
	public function testCorrectDate(){
		$date = new Date('2022-10-10 10:00');
		echo $date->getDataTime() === '2022-10-10 10:00' ? 'PASS' : 'FALL';
	}
}