<?php
echo "Exercise 7: <br>\n";
$persons = array(
	array('name' => 'John', 'lic' => array('123A'), 'cash' => '550'),
	array('name' => 'Brendon', 'lic' => array('123A', '456B'), 'cash' => '920'),
	array('name' => 'Jessica', 'lic' => array('123A', '789C'), 'cash' => '1200'),
	array('name' => 'Gerard', 'lic' => array('789C'), 'cash' => '1200')
);
$guns = array(
	array('name' => 'CCU GOVERNMENT (45ACP)', 'lic' => array('123A'), 'price' => '500'),
	array('name' => 'King Cobra Carry DAO', 'lic' => array('456B'), 'price' => '745'),
	array('name' => 'Bright Cobra (38SPL)', 'lic' => array('223D'), 'price' => '985'),
	array('name' => 'M4 CARBINE EPR (11,5")', 'lic' => array('789C'), 'price' => '1125')
);

for ($p = 0; $p <= count($persons)-1; $p++){
	for ($g = 0; $g <= count($guns)-1; $g++) {
		for ($l = 0; $l <= count($persons[$p]['lic'])-1; $l++) {
			if ($persons[$p]['lic'][$l] == $guns[$g]['lic'][0]) {
				echo "ALLOW! Person: {$persons[$p]['name']} can buy weapon  {$guns[$g]['name']}<br>\n";
			}
		}
	}
}



