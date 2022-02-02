<?php
echo "Exercise 5: \n";
$fruits = array(
	array('fruit' => 'Grapes', 'weight' => '9'),
	array('fruit' => 'Oranges','weight' => '10'),
	array('fruit' => 'Bananas','weight' => '2'),
	array('fruit' => 'Apples','weight' => '15'),
	array('fruit' => 'Leons','weight' => '12'),
	array('fruit' => 'Peaches','weight' => '7')
);
$shipping = array('less' => 1, 'more' => 2);

function shippingPrice ($a, $b){
	foreach($a as $fruit){
		if($fruit['weight'] > 9){
			echo "{$fruit['weight']}kg of {$fruit['fruit']} shipping will cost {$b['more']}€\n";
		}else {
			echo "{$fruit['weight']}kg of {$fruit['fruit']} shipping will cost {$b['less']}€\n";
		}
	}
}
shippingPrice($fruits, $shipping);